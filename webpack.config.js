const { assertSupportedNodeVersion } = require('../src/Engine');

const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js') // Compila o JavaScript do aplicativo Laravel
   .sass('resources/sass/app.scss', 'public/css') // Compila o CSS do aplicativo Laravel
   .react('resources/js/my-react-app.js', 'public/js'); // Compila o JavaScript do React

module.exports = async () => {
    // @ts-ignore
    process.noDeprecation = true;

    assertSupportedNodeVersion();

    const mix = require('../src/Mix').primary;

    require(mix.paths.mix());

    await mix.installDependencies();
    await mix.init();

    return mix.build();
};
