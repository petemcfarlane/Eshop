Feature:
  As a customer
  In order to find a shirt that I like
  I want to browse the range of shirts in the online catalog

  Background:
    Given the product catalog contains the following products
      | title              | category |
      | Sleeveless T-Shirt | shirts   |
      | Polo Shirt         | shirts   |
      | V-neck T-Shirt     | shirts   |

  Scenario:
    When I browse the product catalog for "shirts"
    And I find a shirt I like
    When I add it to my basket
    Then I can can see it in my basket