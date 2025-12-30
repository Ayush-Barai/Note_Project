<?php
use Core\Validator;

it('validates a string ', function () {
    $result = Validator::string('foobar');

    expect($result)->toBeTrue();
});


it('validates a string with minimum length', function () {
    expect(Validator::string('foobar',20))->toBeFalse();

});

it('validates a email', function () {
    expect(Validator::email('Ayush@gmail.com'))->toBeTrue();
    expect(Validator::email('Ayush'))->toBeFalse();
});