<h1 align="center">WpCreator</h1>
<p align="center">
    <!-- <img alt="Preview" src="/art/preview.png"> -->
	<p align="center">
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
name: Clientes
labels:
  plural: Clientes
  singular: Cliente
  menuName: Clientes
slug: clientes
supports: title thumbnail
taxonomies:
  - name: Categoria
    singular: Categoria
    plural: Categorias
    slug: categoria
    hierarchical: 'true'
metaboxes:
  - name: form_cliente
    title: Formulário
    postmetas:
      - id: cpf_cliente
        label: CPF
        type: text
      - id: telefone_cliente
        label: Telefone
        type: text
  - name: birth_date
    title: Aniversário
    postmetas:
      - id: birthdate_cliente
        label: Aniversário
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
id | Postemeta id
label | Postmeta label
type | Type of postmeta input

2. Execute the command __*create:cpt*__ folowing the yaml path:

```php
wpcreator create:cpt example.yaml
```

This command will create a folder named __*"output"*__ with the file __*Cars.php*__ which the basic Custom Post Type configuration customized.