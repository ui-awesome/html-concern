
<p align="center">
    <a href="https://github.com/ui-awesome/html-concern" target="_blank">
        <img src="https://avatars.githubusercontent.com/u/121752654?s=200&v=4" height="100px">
    </a>
    <h1 align="center">UI Awesome HTML Concern Code Generator for PHP.</h1>
    <br>
</p>

<p align="center">
    <a href="https://github.com/ui-awesome/html-concern/actions/workflows/build.yml" target="_blank">
        <img src="https://github.com/ui-awesome/html-concern/actions/workflows/build.yml/badge.svg" alt="PHPUnit">
    </a>
    <a href="https://codecov.io/gh/ui-awesome/html-concern" target="_blank">
        <img src="https://codecov.io/gh/ui-awesome/html-concern/graph/badge.svg?token=H0E4D7157X" alt="Codecov">
    </a>
    <a href="https://dashboard.stryker-mutator.io/reports/github.com/ui-awesome/html-concern/main" target="_blank">
        <img src="https://img.shields.io/endpoint?style=flat&url=https%3A%2F%2Fbadge-api.stryker-mutator.io%2Fgithub.com%2Fui-awesome%2Fhtml-concern%2Fmain" alt="Infection">
    </a>
    <a href="https://github.com/ui-awesome/html-concern/actions/workflows/static.yml" target="_blank">
        <img src="https://github.com/ui-awesome/html-concern/actions/workflows/static.yml/badge.svg" alt="Psalm">
    </a>
    <a href="https://github.styleci.io/repos/767385551?branch=main">
        <img src="https://github.styleci.io/repos/767385551/shield?branch=main" alt="Style ci">
    </a>        
</p>

## Installation

The preferred way to install this extension is through [composer](https://getcomposer.org/download/).

Either run

```shell
composer require --prefer-dist ui-awesome/html-concern:^0.1
```

or add

```json
"ui-awesome/html-concern": "^0.1"
```

to the require section of your `composer.json` file. 

## Usage

List of traits avaibles to use in your classes:

- [HasAttributes](src/HasAttributes.php)
- [HasContaineCollection](src/HasContainerCollection.php)
  > Methods available: `containerAttributes()`, `containerClass()`, `containerTag()`.
- [HasContent](src/HasContent.php)
- [HasLabelCollection](src/HasLabelCollection.php)
  > Methods available: `disabledLabel`, `label`, `labelAttributes()`, `labelClass()`, `labelFor()`.
- [HasPrefixCollection](src/HasPrefixCollection.php)
  > Methods available: `prefix()`, `prefixAttributes()`, `prefixClass()`, `prefixTag()`.
- [HasSeparator](src/HasSeparator.php)
- [HasSuffixCollection](src/HasSuffixCollection.php)
  > Methods available: `suffix()`, `suffixAttributes()`, `suffixClass()`, `suffixTag()`.
- [HasTagName](src/HasTagName.php)
- [HasTemplate](src/HasTemplate.php)
- [HasUncheckedCollection](src/HasUncheckedCollection.php)
  > Methods available: `uncheckedAttributes()`, `uncheckedClass()`, `uncheckedValue()`.

List of components avaibles to use in your classes:

- [HasActivateItems](src/Component/HasActivateItems.php)
- [HasCurrentPath](src/Component/HasCurrentPath.php)
- [HasFirstItemClass](src/Component/HasFirstItemClass.php)
- [HasFirstLinkClass](src/Component/HasFirstLinkClass.php)
- [HasIconCollection](src/Component/HasIconCollection.php)
  > Methods available: `getIconAttributes()`, `iconAttributes()`, `iconClass()`, `iconContent()`, `iconFilePath()`, `iconTag()`.
- [HasLastItemClass](src/Component/HasLastItemClass.php)
- [HasLastLinkClass](src/Component/HasLastLinkClass.php)
- [HasLinkCollection](src/Component/HasLinkCollection.php)
  > Methods available: `getLinkAttributes()`, `linkAttributes()`, `linkClass()`.
- [HasListCollection](src/Component/HasListCollection.php)
  > Methods available: `getListAttributes()`, `listAttributes()`, `listClass()`, `listType()`.
- [HasListContainerCollection](src/Component/HasListContainerCollection.php)
  > Methods available: `getListContainerAttributes()`, `listContainerAttributes()`, `listContainerClass()`, `listContainerTag()`.
- [HasLastItemActiveClass](src/Component/HasLastItemActiveClass.php)
- [HasLinkActiveClass](src/Component/HasActiveClass.php)  
- [HasLinkDisabledClass](src/Component/HasDisabledClass.php) 
- [HasLinkItemActiveClass](src/Component/HasItemActiveClass.php)
- [HasLinkItemDisabledClass](src/Component/HasItemDisabledClass.php) 
- [HasListItemCollection](src/Component/HasListItemCollection.php)
  > Methods available: `getListItemAttributes()`, `listItemAttributes()`, `listItemClass()`, `listItemTag()`.
- [HasListItemContainerCollection](src/Component/HasListItemContainerCollection.php)
  > Methods available: `getListItemContainerAttributes()`, `listItemContainerAttributes()`, `listItemContainerClass()`, `listItemContainerTag()`.
- [HasPrefixItems](src/Component/HasPrefixItems.php)
- [HasSuffixItems](src/Component/HasSuffixItems.php)
- [HasTemplateItems](src/Component/HasTemplateItems.php)
- [HasTemplateLinkItem](src/Component/HasTemplateLinkItem.php)
- [HasToggle](src/Component/HasToggle.php)

## Testing

[Check the documentation testing](docs/testing.md) to learn about testing.

## Support versions

[![PHP81](https://img.shields.io/badge/PHP-%3E%3D8.1-787CB5)](https://www.php.net/releases/8.1/en.php)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.

## Our social networks

[![Twitter](https://img.shields.io/badge/twitter-follow-1DA1F2?logo=twitter&logoColor=1DA1F2&labelColor=555555?style=flat)](https://twitter.com/Terabytesoftw)
