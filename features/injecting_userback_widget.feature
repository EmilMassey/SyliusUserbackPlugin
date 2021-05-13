@inject_userback_widget
Feature: Injecting Userback widget
    In order to provide better User Experience
    As a Store Owner
    I want to allow users to give feedback about my Store

    Scenario: Not injecting widget if access token is not set
        Given access token is not set
        When the user visits the store
        Then they should not see Userback widget

    Scenario: Injecting widget if access token is set
        Given access token is set
        When the user visits the store
        Then they should see Userback widget
