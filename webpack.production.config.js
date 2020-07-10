const path = require( 'path' )

module.exports = {
    mode: `production`,
    module: {
        rules: [
            {
                test: /\.(js)$/,
                exclude: /node_modules/,
                use: [ `babel-loader` ]
            }
        ]
    },
    resolve: {
        extensions: [ `*`, `.js` ]
    },
    entry: {
        main: [
            `./src/scripts/frontend/core.js`,
            `./src/scripts/frontend/autoload-components.js`,
            `./src/scripts/frontend/site-header.js`,
            `./src/scripts/frontend/main.js`
        ],
        lazyLoading: `./src/scripts/inc/lazy-loading-fallback.js`,
        admin: `./src/scripts/backend/admin.js`,
        editor: `./src/scripts/backend/editor.js`
    },
    output: {
        path: path.resolve( __dirname, `assets/scripts` ),
        filename: `[name].js`
    }
}