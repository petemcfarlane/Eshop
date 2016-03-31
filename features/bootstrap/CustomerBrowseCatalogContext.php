<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\TableNode;
use Eshop\Product\Category;
use Eshop\Product\Product;
use Eshop\Product\ProductCatalog;
use Eshop\Shop\Basket;

/**
 * Defines application features from the specific context.
 */
class CustomerBrowseCatalogContext implements Context, SnippetAcceptingContext
{
    /**
     * @var ProductCatalog
     */
    private $productCatalog;

    /**
     * @var Product
     */
    private $product;

    /**
     * @var Product[]
     */
    private $products = [];

    /**
     * @var Basket
     */
    private $basket;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->productCatalog = new ProductCatalog();
        $this->basket = new Basket();
    }

    /**
     * @Transform table:title,category
     */
    public function tableToProducts(TableNode $table): array
    {
        return array_map(function ($row) {
            return new Product($row['title'], Category::fromString($row['category']));
        }, $table->getHash());
    }

    /**
     * @Transform :category
     */
    public function categoryFromString(string $category): Category
    {
        return Category::fromString($category);
    }

    /**
     * @Given the product catalog contains the following products
     */
    public function theProductCatalogContainsTheFollowingProducts(array $products)
    {
        $this->productCatalog->addProducts($products);
    }

    /**
     * @When I browse the product catalog for :category
     */
    public function iBrowseTheProductCatalogFor(Category $category)
    {
        $this->products = $this->productCatalog->browseCategory($category);

        if (empty($this->products)) {
            throw new RuntimeException(sprintf("No products for category %s", $category));
        }
    }

    /**
     * @When I find a shirt I like
     */
    public function iFindAShirtILike()
    {
        $this->product = reset($this->products); // just take the first product for now

        if (! $this->product instanceof Product) {
            throw new RuntimeException("Didn't find a product");
        }
    }

    /**
     * @When I add it to my basket
     */
    public function iAddItToMyBasket()
    {
        $this->basket->add($this->product);
    }

    /**
     * @Then I can can see it in my basket
     */
    public function iCanCanSeeItInMyBasket()
    {
        if (!$this->basket->contains($this->product)) {
            throw new RuntimeException("Basket does not contain product!");
        }
    }
}
