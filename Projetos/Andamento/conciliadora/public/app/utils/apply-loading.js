/* @flow */

import loadingPadrao from './loading';

import type { Loading } from './types';

const applyLoading = (
    func: Function,
    loading: Loading = loadingPadrao,
) => (...args: any): Promise<any> => Promise.resolve()
    .then(() => loading.show())
    .then(() => func(...args))
    .catch((error) => {
        loading.hide();
        return Promise.reject(error);
    })
    .then((result) => {
        loading.hide();
        return result;
    });


export default applyLoading;
