<h1 align="center">WpCreator</h1>
<p align="center">
    <!-- <img alt="Preview" src="/art/preview.png"> -->
	<p align="center">
		<a href="https://github.com/marcosnunesmbs/wpcreator/actions"><img alt="Build Status" src="https://github.com/marcosnunesmbs/wpcreator/workflows/CI/badge.svg"></a>
		<a href="//packagist.org/packages/marcosnunesmbs/wpcreator"><img alt="Latest Stable Version" src="https://poser.pugx.org/marcosnunesmbs/wpcreator/v"></a>
		<a href="//packagist.org/packages/marcosnunesmbs/wpcreator"><img alt="License" src="https://poser.pugx.org/marcosnunesmbs/wpcreator/license"></a>
	</p>
</p>

## Description

A simple php cli to create Wordpress Custom Post Types, Elementor's Widgets and another utilityes by yaml files.

## Getting Started

### Instal
This CLI application is a Wordpress Custom Post Type Builder written in PHP and is installed using [Composer](https://getcomposer.org/):

``` bash
composer global require marcosnunesmbs/wpcreator
```

### Usage

#### Creating a Custom Post Type

1. Create a file *example.yaml* with basic informations:

``` yaml
name: Cars
labels:
  plural: Cars
  singular: Car
  menuName: Cars
slug: car
supports: title editor authors thumbnail

```
|Parameter | Description|
| -------- | ---------- |
name | The name of CPT and File
plural | The plural name of CPT
singular | The singular name of CPT
menuName | The Menu name of CPT
slug | The slug name of CPT
supports | The list of supports separetade by spaces. See more arguments on [documentation](https://developer.wordpress.org/reference/functions/register_post_type/#supports).


2. Execute the command __*create:cpt*__ folowing the yaml path:

```php
wpcreator create:cpt example.yaml
```

This command will create a folder named __*"output"*__ with the file __*Cars.php*__ which the basic Custom Post Type configuration customized.