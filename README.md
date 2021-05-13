# Empressia Sylius Userback Plugin

## Documentation

The plugin allows you to inject [Userback](https://www.userback.io/) widget to your Store so your Users can give you 
a feedback on their experience.

## Installation

1. Add composer dependency: `composer require empressia/sylius-userback-plugin`
   
2. Generate widget on [userback.io](https://www.userback.io/) and copy Access Token 
   (lookup `Userback.access_token` line in generated Widget Code)
   
3. Setup the Access Token environmental variable (you can paste `USERBACK_ACCESS_TOKEN=paste_your_token_here` 
   in your `.env.local` file). Leave it blank if you want to disable widget.
   
**Instructions below are valid only if you use default Sylius configuration and layouts. The plugin makes use of 
`sylius.shop.layout.head` block in default Sylius layout.**

4. Paste this snippet on top of `config/packages/_sylius.yaml` file:
    ```yaml
    imports:
      - { resource: "@EmpressiaSyliusUserbackPlugin/Resources/config/sylius_ui.yaml" }
    ```

## Quality Assurance
### Prepare test environment

From the root directory, run the following commands:

    ```bash
    cd tests/Application
    APP_ENV=test bin/console doctrine:database:create
    APP_ENV=test bin/console doctrine:schema:create
    APP_ENV=test bin/console sylius:install
    ```

To be able to setup a plugin's database, remember to configure you database credentials in `tests/Application/.env` and `tests/Application/.env.test`.

### Running plugin tests

  - PHPUnit

    ```bash
    vendor/bin/phpunit
    ```

  - Behat (non-JS scenarios)

    ```bash
    vendor/bin/behat --strict --tags="~@javascript"
    ```
    
  - Static Analysis
  
    - Psalm
    
      ```bash
      vendor/bin/psalm
      ```
      
    - PHPStan
    
      ```bash
      vendor/bin/phpstan analyse -c phpstan.neon -l max src/  
      ```
