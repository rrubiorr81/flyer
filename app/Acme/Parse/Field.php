<?php

namespace Acme\Parse;

use Acme\Parse\Exceptions\UnrecognizedType;

class Field
{

    /**
     * @param $parseString
     * @return array|mixed
     * @throws UnrecognizedType
     */
    public function parse($parseString)
    {
        $chunks = $this->extractIntoChunks($parseString);

        $parseResult = [];
        foreach ($chunks as $chunk) {
            $parseResult = $this->parseChunk($chunk, $parseResult);
        }

        return $parseResult;
    }

    /**
     * @param $parseString
     * @return array
     */
    protected function extractIntoChunks($parseString)
    {
        $chunks = explode(",", $parseString);
        return $chunks;
    }

    /**
     * @param $chunk
     * @param $parseResult
     * @return mixed
     * @throws UnrecognizedType
     */
    protected function parseChunk($chunk, $parseResult)
    {
        list($field, $value) = explode(":", trim($chunk));
        if (!in_array(trim($value), ['string', 'int', 'integer', 'text'])) {
            throw new UnrecognizedType("Wrong type");
        }
        $parseResult[trim($field)] = trim($value);
        return $parseResult;
    }
}
