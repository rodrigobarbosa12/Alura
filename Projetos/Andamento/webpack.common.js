/* eslint import/no-extraneous-dependencies: ["error", {"devDependencies": true}] */

const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const path = require('path');
const webpack = require('webpack');
const CleanWebpackPlugin = require('clean-webpack-plugin');
const ManifestPlugin = require('webpack-manifest-plugin');

module.exports = {
    context: path.resolve(__dirname, 'public'),
    entry: {
        resumo: './app/resumo',
        comprovante: './app/comprovante',
    },
    output: {
        filename: '[name].[chunkhash].js',
        path: path.resolve(__dirname, 'public/dist'),
    },
    module: {
        rules: [
            {
                test: /\.(js|jsx)$/,
                exclude: /node_modules/,
                use: ['babel-loader', 'eslint-loader'],
            },
            {
                test: /\.(css|scss|sass)$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: { sourceMap: true },
                    },
                    {
                        loader: 'sass-loader',
                        options: { sourceMap: true },
                    },
                ],
            },
            {
                test: /\.(html)$/,
                loader: 'raw-loader',
            },
            {
                test: /\.(png|jpg|gif|jpeg|svg)$/,
                loader: 'url-loader',
            },
        ],
    },
    optimization: {
        splitChunks: {
            cacheGroups: {
                commons: {
                    name: 'commons',
                    chunks: 'initial',
                    minChunks: 2,
                },
            },
        },
    },
    plugins: [
        new ManifestPlugin({
            basePath: 'dist/',
            publicPath: 'dist/',
        }),
        new CleanWebpackPlugin(['public/dist']),
        new webpack.HashedModuleIdsPlugin(),
        new webpack.IgnorePlugin(/^\.\/locale$/, /moment$/),
        new MiniCssExtractPlugin({
            filename: '[name].[chunkhash].css',
            chunkFilename: '[id].[hash].css',
        }),
    ],
    resolve: {
        extensions: ['.js', 'index.js', 'index.jsx', '.json', '.jsx', '.scss'],
    },
    externals: {
        jquery: 'jQuery',
        moment: 'moment',
    },
};
