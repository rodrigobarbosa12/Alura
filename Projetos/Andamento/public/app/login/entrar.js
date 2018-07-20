/* @flow */

import cookies from 'js-cookie';
import xhr from '../utils/xhr';
import applyLoading from '../utils/apply-loading';

import type { Params } from './types';

const getUrlRedirecionamento = () => global.Vars.urlSolicitada || global.location.origin;

const setToken = (token: string) => cookies.set('token-api', token);

const entrar = async (params: Params) => {
    const { data: { token } } = await xhr.post('/login', params);
    setToken(token);
    global.location.assign(getUrlRedirecionamento());
};

export default applyLoading(entrar);
