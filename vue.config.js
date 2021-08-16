const path = require("path");

// https://cli.vuejs.org/config/
module.exports = {
  lintOnSave: true,
  filenameHashing: false,
  chainWebpack: (config) => {
    config.optimization.delete("splitChunks");
  },
  publicPath:
    process.env.NODE_ENV === "production"
      ? "/wp-content/themes/mckl/dist"
      : "/mckl",
  assetsDir:
    process.env.NODE_ENV === "production" ? "" : "wp-content/themes/mckl/dist",
  configureWebpack: {
    // https://medium.com/@romualdasromasdakeviius/using-vue-cli-to-build-wordpress-plugin-including-hmr-1a71dfdf05c2
    externals: {
      jquery: "jQuery",
    },
  },
  // for wordpress refresh
  devServer: {
    before: function(app, server, compiler) {
      server._watch("./**/*.php");
    },
    contentBase: path.join(__dirname, "/"),
    host: "localhost",
    hot: true,
    inline: true,
    overlay: true,
    port: 8086,
    // proxy: 'http://localhost:4000',
    proxy: {
      "/": {
        target: "http://localhost/mckl",
        secure: false,
      },
    },
  },
};
