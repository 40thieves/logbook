Feature: Create Logs

  In order to make new log entries
  As me
  I need to be able to create and edit logs

  Scenario: Creating log (without map data)
    Given I am logged in
    And I am on "/new"
    When I fill in "date" with "07/03/2015"
    And I fill in "region" with "Snowdonia"
    And I fill in "status" with "Leader"
    And I fill in "members" with "Me"
    And I fill in "route" with "A description of the route"
    And I press "Submit"
    Then I should see "Snowdonia Route"