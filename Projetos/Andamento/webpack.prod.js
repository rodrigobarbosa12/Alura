/* eslint import/no-extraneous-dependencies: ["error", {"devDependencies": true}] */

const merge = require('webpack-merge');
const common = require('./webpack.common.js');
const UglifyJsPlugin = require('uglifyjs-webpack-plugin');

module.exports = merge(common, {
    devtool: 'sourcemap',
    mode: 'production',
    plugins: [
        new UglifyJsPlugin({
            sourceMap: true,
        }),
    ],
});
