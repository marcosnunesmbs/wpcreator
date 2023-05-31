# WpCreator

## Description

A simple php cli to create Wordpress Custom Post Types, Elementor's Widgets and another utilityes by yaml files.

## Getting Started

...

### Creating a Custom Post Type

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
bin/wpcreator create:cpt example.yaml
```

This command will create a folder named __*"output"*__ with the file __*Cars.php*__ which the basic Custom Post Type configuration customized.