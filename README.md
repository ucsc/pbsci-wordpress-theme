# UC Santa Cruz PBSci/Science Division WordPress Theme

[WordPress](https://github.com/wordpress/) theme for [UC Santa,Cruz Science](https://science.ucsc.edu/), created with [_s](https://github.com/Automattic/_s).

## Built with

- [_s](https://github.com/Automattic/_s)
- [Advanced Custom Fields](https://www.advancedcustomfields.com/)
- [List.js](https://listjs.com/)
- [FlexSlider 2](http://flexslider.woothemes.com/)
- [Font Awesome](https://fontawesome.com/)

## Dependencies

- [Node.js](https://nodejs.org/en/)
- [npm](https://www.npmjs.com/)
- [Gulp](https://gulpjs.com/)

## Install and build

Clone this repository into the `/wp-content/themes/` directory of your WordPress development environment. Navigate to the directory you cloned this repo into with your terminal and type:

```console
npm install
```

Wait several minutes for the installation to complete and you're in business!

## Gulp tasks

There are two Gulp tasks defined in the `gulpfile.js` file:

There is no `style.css` file in this repo. The `gulp styles` task will build your `style.css` file based on the SASS files located in `/assets/sass/`. This task will also created minified styles, saved as `styles.min.css`.

```console
gulp styles
```

The `gulp watch` task will continuously watch your `/assets/sass/` directory and rebuild your styles every time you save a SASS file.

```console
gulp watch
```

## Additional Requirements

The **Science** website also requires a custom plugin to run properly.

- [PBSci Core Functionality Plugin](https://github.com/ucsc/pbsci-core-functionality-plugin)

## Credits

- Project Manager: [Rob Knight](https://github.com/knice)
- Lead Developer: [Jason Chafin](https://github.com/herm71)