Storm Admin Template for Yii2
=============================

This project is limited use for internal of Haqqi's company. Initiated and developed by Muhammad Fauzil Haqqi on behalf of company PT Aku Peduli Indonesia and Pictalogi.com. Any other use is permitted without warranty and support from us.

This template might use a snippet from other template and get some inspirations from other code.

Installation
------------

### Asset Files and Dependencies

Because we try to avoid using `fxp/composer-asset-plugin`, since it might probable be left behind by Yii2 (due to slow load), we are using special `replace` command in composer. This `replace` will be handled by this extension. But to use this template, you need to provide the included `bower.json` and `.bowerrc` in your main project composer.

Then, in your main composer file, we suggest you to put:

```
"scripts": {
  "post-update-cmd": "bower update"
}
```

During development, because we suggest that you completely uninstall `fxp/composer-asset-plugin`, you need to put this line in your `composer.json` file:

```
"replace": {
  "bower-asset/typeahead.js": "*"
},
```

F.A.Q.
------

- Where is the rest of the documentation? In the `docs` folder of this repository.


Changelog
---------

```
2016-10-28
- Project moving started from previous code
- Add .gitignore for some files
- Add basic composer.json with PSR-4
```

