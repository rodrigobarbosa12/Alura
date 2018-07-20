/* @flow */

import login from './login';

if (document.forms.namedItem('form-login')) {
    login(document.forms.namedItem('form-login'));
}
