const defaultConfig = require("@wordpress/scripts/config/webpack.config");

const webpackConfig = {
  ...defaultConfig,
  entry: {
    ...defaultConfig.entry,
    front: "./src/front.js",
  },
};
module.exports = webpackConfig;
