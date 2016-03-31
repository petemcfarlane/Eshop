# This is an example e-shop, trying to use Modelling by Example, for learning and fun.

If you have any comments or suggestions please let me know on [GitHub](https://github.com/petemcfarlane/Eshop), [Twitter](http://twitter.com/PeteJMcFarlane) or [email](mailto:peterjohnmcfarlane@gmail.com)

This is designed to take advantage of PHP7 features so if you don't have that installed I suggest running the commands through a PHP7 docker container.

You can clone it to your computer with the command `git clone git@github.com:petemcfarlane/Eshop.git`. 

Once you navigate inside the newly created directory you can install the composer dependancies: __Behat__ - useful for writing features/stories and documenting behaviour, and __PhpSpec__ - used for creating unit tests with TDD. Run `composer install` to install both of these dependancies.

To run the Behat test suite, run `vendor/bin/behat`. 

To run the PhpSpec tests run `vendor/bin/phpspec run`.

The first thing to look at is the file `features/browse_catalog.feature`. The features dir is where all the features we add will live. Feature files (*.feature) are written in Gherkin format. They usually contain one or more examples (called Scenarios) with one or more steps (a line starting with Given, When, Then, And or But). The lines magically translate directly to executable code in my Context file (found in `features/bootstrap/CustomerBrowseCatalogContext.php`).

In my context file I try to use natural language that mirrors the domain (the Ubiquitous Language), for example `$this-productCatalog->browseCategory($category)` and `$this->basket->add($product)`. None of the objects I'm referencing exist at this point, and if I run the `behat` command I will get a fatal error. This is where I switch to phpspec to design the individual objects. 

If I use the command `phpspec desc Eshop/Product/ProductCatalog` for example, then phpspec will create a spec file (a description, or unit test of how the individual object should behave) in my `spec` directory. You can see an example at `spec/Eshop/Product/ProductCatalogSpec.php`. 
Spec files are like special php files, so some exceptions apply. For example, it is common to use snake_case rather than camelCase for naming methods as its easier to read the long descriptions.
Each method that starts with `function it_...()` should describe some behaviour about the object. The `$this` refers to the object you are spec'ing. The normal procedure is to set up an object ready for test (if necessary), manipulate the object by calling its methods on `$this`, then asserting the outcome, e.g. $this->testMethod()->shouldReturn(_expected outcome_);
At this point you won't have created the method on the object yet. If you run phpspec `phpspec run` it will offer to create a stub of the method for you, and you can proceed to fill in the method implementation using the TDD cycle.

So you'll see what we're left with is the source code in `src/`. There's not a lot in there yet and it doesn't do much, but we can start to flesh out the model from there and build from features and tests as we go.
