<?php

namespace spec\Acme\Parse;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FieldSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Acme\Parse\Field');
    }

    function it_parses_string_into_array()
    {
        $this->parse("value:string, number:int")->shouldReturn(
            [
                "value" => "string",
                "number" => "int"
            ]
        );

        $this->parse("value:string")->shouldReturn(
            [
                "value" => "string"
            ]
        );

        $this->parse("value : string")->shouldReturn(
            [
                "value" => "string"
            ]
        );

        $this->parse("value : string , number : int")->shouldReturn(
            [
                "value" => "string",
                "number" => "int"
            ]
        );
    }

    function it_thows_an_exception_if_type_is_not_recognized()
    {
        $this->shouldThrow('Acme\Parse\Exceptions\UnrecognizedType')
            ->duringParse('value:fiesta');
    }
}
