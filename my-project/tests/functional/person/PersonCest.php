<?php

class PersonCest
{
    public function _before(FunctionalTester $I)
    {
        $I->haveHttpHeader('Content-Type', 'application/json');
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {
    }

    public function createPerson(FunctionalTester $I)
    {
        $I->sendPOST(
            'create/person',
            array('name' => 'andre', 'age' => 23)
        );
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::CREATED);

        $I->sendPOST(
            'create/person',
            array('name' => '', 'age' => 23)
        );
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::INTERNAL_SERVER_ERROR);

        $I->sendPOST(
            'create/person',
            array('name' => 'andre', 'age' => 101)
        );
        $I->seeResponseCodeIs(\Codeception\Util\HttpCode::INTERNAL_SERVER_ERROR);
    }
}
