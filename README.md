# Email Template

**Extension-Key:** email_template

**Dependencies:**

* TYPO3: Version 11.5, 12.4, 13.3
* EXT: html_mail_utility

## What does it do?

The *Email Templates* provides responsive newsletter templates for TYPO3 bases on **Foundation for Emails 2 (formerly Inky)** (https://get.foundation/emails/docs/). The Foundation-Inky templates can be used directly in fluid and will be translated into a bulletproof oldfashioned HTML table code. This templates can be used to build templates for a Newsletter in TYPO3.

## Installation
### Composer Install

Use

    composer require undkonsorten/email-template

The dependency `html_mail_utility` will be installed automatically by composer.

### Non-Composer mode

Using without composer ist not supported!


### Include TypoScript Setup

Include the TypoScript templates for

* HTML Mail Utility (html_mail_utility)
* Content Elements (fluid_styled_content)
* the default template:
  * Newsletter HTML mail rendering (email_template): includes the Main/setup.typoscript
  * Newsletter Plaintext rendering (email_template)
* ? What about html mail utility ?

### Include: Page TSConfig

Include for your newsletter folder the pageTsConfig (from extensions):

* EmailTemplate Default PageTS (email_template): Includes a one columned BE-Layout and some other default things
* EmailTemplate BE Layout One Column: Includes only Page TS for a default BE-Layout

---

### Configuration

Most of the needed settings can be defined with constants in the TYPO3 constant editor.
Important settings are

* `plugin.tx_emailtemplate.htmlMail.typeNum`: This page type will be used for rendering of the email. By default it is 1485434607. Use it in browser to see the used html code on email sending.
* `plugin.tx_emailtemplate.plainText.typeNum`: The page type for plain text rendering of the email should be defined. By default it is 1485434634

Look at the TypoScript files in `Configuration/TypoScript` folders to see which more settings you can use in your own TypoScript template.

### Using Foundation Frontend build

Globally install it and check out the rest from the guide [https://get.foundation/emails/docs/]:

```
sudo npm install --global foundation-cli
```
It's important to use the output of
```
npm run start
```
If you use the *npm run build* unused CSS classes might be removed.
You should remove inline source mapping from the resulting app.css, though.


To create the *app.css* run foundation with
```npm run build```


#### app.css

The *app.css* file will be inlined in markup by the TYPO3 Extension HTMl Mail Utility. The app.css can be found in the dist/css folder.


#### inject.css

The *inject.css* will be included in as a style tag in TYPO3.

The *inject.scss* only be created by the ```npm run build``` command. There will be an inlined ```<style>@media ...</tag>``` block in the output. Out of this styles you manually need to create the *inject.css* file and add it to you Css folder (Public Resources).

This helps to keep footprint of included style rules low (just pseudo elements and media queries).

### Included CSS files in TYPO3

Defined CSS files via the TS constants:
```
plugin.tx_emailtemplate.cssFile = EXT:my_theme_extension/Resources/Public/Css/app.css
plugin.tx_emailtemplate.injectCssFile = EXT:my_theme_extension/Resources/Public/Css/inject.css
```

## Page Types

The HTML newsletter is sent out with a custom page type for the mails (see Constants). If the newsletter is shown without this page type the *read online link* and the *unsubscribe link* are not rendered.


## Newsletter Content

### Page Properties of the Newsletter Page

* Page Title:
  * is used for the Subject of the newsletter
  * is used in the template for the newsletter for the edition line (Fluid: {data.title})
* Page Subtitle
  * can be called in the Fluid template via {data.subtitle}
* Page Description
  * is used for the normally visually hidden Foundation "preheader". The preheader will display in email clients like Outlook, Gmail etc. It prevents the line "Read this newsletter online" to be shown as preview/abstract in those email clients. It should have a length of 50-100 characters.
  * a fallback can be defined via the constant defaultDescription in case the editor does not fill in the page description


### Newsletter Content Elements

The newsletter can display the following content elements

* Content-Menu (Special Menus with the Menu Type *Section index (page content marked for section menus). Here only content elements will be listed with have checked the field *Show in Section Menus* in the Appearance Tab
* Headlines (just a header without Text)
* Text-Media for Images and text (with image above, left, right) or just only text
* Divider (for a horizontal divider between the content elements)
* Plugins

#### Add rendering of your own content elements or other plugins

To add rendering for your own CTypes or Plugins you need to do following steps in general:

* For plugins (e.g. news) include the TypoScript configuration of the extension (in your SitePackage or directly in the
DB in sys_template data)
* add the new CType to your page TS-Config if you are using the page TS configuration from `email_template`.
**Add this after the include of page TS configuration from `email_template`!**

```typo3_typoscript
# page ts example to add news plugin type to the allowed items
TCEFORM.tt_content {
  # Define used CTypes in newsletter.
  CType {
    keepItems := addToList(news_newsselectedlist)
  }
}
```

* extend the `plugin.tx_emailtemplate.lib.column.renderObj` TS-Object. Copy `text` object to get all the default
properties from `email_template`

````typo3_typoscript
# example for news plugin
plugin.tx_emailtemplate {
  lib.column {
    renderObj {
      news_newsselectedlist < .text
    }
  }
}
````
For Plugins the `Generic.html` template in `project/vendor/undkonsorten/email-template/Resources/Private/Content/Templates`
is used.

* Usage of other template files for Extensions/Plugins like news can you define in normal way. Set new paths within the
constants or setup of the Extensions.

* If you want to use your own template files for custom CTypes (not Plugins/Extensions) set paths in TS Constants
and add your own template files for the CTypes to your SitePackage. Using Constant Editor is possible for this.

```typo3_typoscript
plugin.tx_emailtemplate {
    view.content {
        templateRootPath =
    }
}
```


## Test your template:

* [Testi@](https://testi.at)
* [Chrome Extension Testi](https://chrome.google.com/webstore/detail/testi-live-email-testing/hbgeikbbpfjgcicclnjcokjapbgkkfkd)
