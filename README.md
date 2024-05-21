# SHOPPING MALL

Build basic REST API (CRUD) to manipulate a list of products in the database.
- Categories should consist of a title and description fields;
- You don’t need to create a CRUD for categories, so you may just fill this table with some
test data manually;
- Products should consist of a title, description, SKU, and price fields;
- SKU is an alpha-numeric identification of the product in the catalog, it must be unique
and exactly 8 characters long;
- Each product should belong to a single category;
- Product details endpoint (GET /api/products/{id}) should also output the category relation
each product belongs to;


## Deployment

To deploy this project run

  git clone 

  .env configurations for db

  composer install

  php artisan key:generate

  php artisan migrate

  php artisan db:seed

  php artisan serve

