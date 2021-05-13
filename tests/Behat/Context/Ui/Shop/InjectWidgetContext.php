<?php

declare(strict_types=1);

namespace Tests\Empressia\SyliusUserbackPlugin\Behat\Context\Ui\Shop;

use Behat\Behat\Context\Context;
use Sylius\Behat\Page\Shop\HomePageInterface;
use Webmozart\Assert\Assert;

final class InjectWidgetContext implements Context
{
    private HomePageInterface $homepage;

    public function __construct(HomePageInterface $homepage)
    {
        $this->homepage = $homepage;
    }

    /**
     * @When /^the user visits the store$/
     */
    public function theUserVisitsTheStore()
    {
        $this->homepage->open();
    }

    /**
     * @Then /^they should not see Userback widget$/
     */
    public function theyShouldNotSeeUserbackWidget()
    {
        Assert::notContains($this->homepage->getContent(), 'Userback.access_token = \'lorem_ipsum\'');
    }

    /**
     * @Then /^they should see Userback widget$/
     */
    public function theyShouldSeeUserbackWidget()
    {
        Assert::contains($this->homepage->getContent(), 'Userback.access_token = \'lorem_ipsum\'');
    }

    /**
     * @Given /^access token is set$/
     */
    public function accessTokenIsSet()
    {
        putenv('USERBACK_ACCESS_TOKEN=lorem_ipsum');
    }

    /**
     * @Given /^access token is not set$/
     */
    public function accessTokenIsNotSet()
    {
        putenv('USERBACK_ACCESS_TOKEN=');
    }
}
