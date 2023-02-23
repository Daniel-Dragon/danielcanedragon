const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');

module.exports = {
  entry: {
    'index': './src/index.js',
    // 'blocks/my-block': './src/blocks/my-block/index.js',
    // 'blocks/another-block': './src/blocks/another-block/index.js',
    // 'templates/my-template': './src/templates/my-template.php',
  },
  output: {
    path: path.resolve(__dirname+'/wp-content/themes/danielcanedragon', 'build'),
    filename: '[name].js',
  },
  optimization: {
    minimizer: [
      new TerserPlugin(),
      new CssMinimizerPlugin(),
    ],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '[name].css',
    }),
    new CleanWebpackPlugin(),
  ],
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@wordpress/default'],
          },
        },
      },
      {
        test: /\.css$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
        ],
      },
      {
        test: /\.scss$/,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader',
        ],
      },
      {
        test: /\.php$/,
        use: [
          'raw-loader',
          {
            loader: 'string-replace-loader',
            options: {
              search: '__URI_TO_MY_ASSETS__',
              replace: '/wp-content/themes/my-theme/build',
              flags: 'g',
            },
          },
        ],
      },
    ],
  }  
};
