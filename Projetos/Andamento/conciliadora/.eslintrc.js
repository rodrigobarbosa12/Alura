module.exports = {
    env: {
        browser: true,
        es6: true
    },
    extends: [
        'airbnb-base',
        'plugin:flowtype/recommended',
    ],
    rules: {
        'flowtype/define-flow-type': 1,
        'flowtype/use-flow-type': 1,
        indent: [2, 4],
        'no-param-reassign': [2, { "props": false }],
    }
};