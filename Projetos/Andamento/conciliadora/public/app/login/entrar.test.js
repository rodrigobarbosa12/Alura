/* eslint-env node, mocha */

import { expect } from 'chai';
import sinon from 'sinon';
import cookie from 'js-cookie';
import xhr from '../utils/xhr';
import entrar from './entrar';

describe('login', () => {
    describe('entrar', () => {
        const location = {
            origin: 'http://host.com.br',
            assign: sinon.spy(),
        };

        global.Vars = {};
        global.location = location;
        global.mApp = { unblock: () => null, block: () => null };

        let post;
        let setCookie;

        beforeEach(() => {
            post = sinon.stub(xhr, 'post');
            setCookie = sinon.stub(cookie, 'set');
        });

        afterEach(() => {
            post.restore();
            setCookie.restore();
        });

        it('Deve retornar objeto de resposta de erro', async () => {
            post.withArgs('/login', {
                email: 'fulano@dominio.com',
                senha: 'segredo',
            })
                .rejects({
                    response: {
                        data: {
                            message: 'Não existe',
                        },
                    },
                });

            try {
                await entrar({
                    email: 'fulano@dominio.com',
                    senha: 'segredo',
                });
            } catch (err) {
                expect(err).to.be.deep.equal({
                    response: {
                        data: {
                            message: 'Não existe',
                        },
                    },
                });
            }

            expect(post.calledOnce).to.be.equal(true);
        });

        it('Deve setar o cookie e redirecionar para location.origin', async () => {
            post.withArgs('/login', {
                email: 'fulano@dominio.com',
                senha: 'segredo',
            })
                .resolves({
                    data: {
                        token: 'um-token-bem-legal',
                    },
                });

            await entrar({
                email: 'fulano@dominio.com',
                senha: 'segredo',
            });

            expect(post.calledOnce).to.be.equals(true);
            expect(setCookie.calledWith('token-api', 'um-token-bem-legal')).to.be.equals(true);
            expect(location.assign.calledWith(location.origin)).to.be.equals(true);
        });

        it('Deve setar o cookie e redirecionar para urlSolicitada', async () => {
            global.Vars.urlSolicitada = 'http://alfredfood.com.br/esta-url-foi-solicitada-via-get';
            post.withArgs('/login', {
                email: 'fulano@dominio.com',
                senha: 'segredo',
            })
                .resolves({
                    data: {
                        token: 'um-token-bem-legal',
                    },
                });

            await entrar({
                email: 'fulano@dominio.com',
                senha: 'segredo',
            });

            expect(post.calledOnce).to.be.equals(true);
            expect(setCookie.calledWith('token-api', 'um-token-bem-legal')).to.be.equals(true);
            expect(location.assign.calledWith('http://alfredfood.com.br/esta-url-foi-solicitada-via-get')).to.be.equals(true);
        });
    });
});
