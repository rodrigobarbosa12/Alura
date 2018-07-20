/* eslint import/no-extraneous-dependencies: ["error", {"devDependencies": true}] */

const merge = require('webpack-merge');
const common = require('./webpack.common.js');

module.exports = merge(common, {
    devtool: 'eval',
    mode: 'development',
});
