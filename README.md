<h1 align="center">WpCreator</h1>
<p align="center">
    <!-- <img alt="Preview" src="/art/preview.png"> -->
	<p align="center">
    <a href="https://github.com/marcosnunesmbs/wpcreator/actions"><img alt="Build Status" src="https://github.com/marcosnunesmbs/wpcreator/actions/workflows/php.yml/badge.svg"></a>
		<a href="//packagist.org/packages/marcosnunesmbs/wpcreator"><img alt="Latest Stable Version" src="https://img.shields.io/packagist/v/marcosnunesmbs/wpcreator.svg?style=flat-square"></a>
		<a href="//packagist.org/packages/marcosnunesmbs/wpcreator"><img alt="License" src="https://poser.pugx.org/marcosnunesmbs/wpcreator/license"></a>
	</p>
</p>

## Description

A simple php cli to create Wordpress Custom Post Types, Elementor's Widgets and another utilityes by yaml files.

## Getting Started

### Install
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
  slug: cars
supports: title thumbnail
taxonomies:
  - name: Manufacturer
    singular: Manufacturer
    plural: Manufacturers
    slug: manufacturer
    hierarchical: 'true'
metaboxes:
  - name: form_car
    title: Form
    postmetas:
      - id: model_car
        label: Model
        type: text
      - id: old_car
        label: Old
        type: text
  - name: form2
    title: Form 2
    postmetas:
      - id: purchase_date
        label: Purchase Date
        type: date

```
|Parameter | Description|
| -------- | ---------- |
name | The name of CPT and File
plural | The plural name of CPT
singular | The singular name of CPT
menuName | The Menu name of CPT
slug | The slug name of CPT
supports | The list of supports separetade by spaces. See more arguments on [documentation](https://developer.wordpress.org/reference/functions/register_post_type/#supports).
taxonomies | array of taxonomies
name | Taxonomy Name (Singular)
title | Title of taxonomie
postmetas | Array of postmetas
id | Postmeta id
label | Postmeta label
type | Type of postmeta input

2. Execute the command __*create:cpt*__ folowing the yaml path:

```php
wpcreator create:cpt example.yaml
```

This command will create a folder named __*"output"*__ with the file __*Cars.php*__ which the basic Custom Post Type configuration customized.
