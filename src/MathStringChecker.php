<?php
declare(strict_types=1);

namespace asv2108\String;

use http\Exception\InvalidArgumentException;

/**
 * Checker a math string by the specific pattern
 *
 * Class MathStringChecker
 * @package asv2108\String
 */
final class MathStringChecker
{
    /**
     * @param string $mathString
     * @return array
     */
    public function __invoke(string $mathString): array
    {
        $response = [
            'success' => true,
            'errMessage' => ''
        ];

        if ($this->isWrongArguments($mathString)) {
            $response['success'] = false;
            $response['errMessage'] = 'Only math symbols!';

            return $response;
        }

        if ($this->isWrongFormat($mathString)) {
            $response['success'] = false;
            $response['errMessage'] = 'The expression has wrong format!';
        }

        return $response;
    }

    /**
     * Check right math format
     *
     * @param string $mathString
     * @return bool
     */
    private function isWrongArguments(string $mathString): bool
    {
        $wrongArgument = '#[a-z]#iu';
        if (preg_match($wrongArgument, $mathString)) {
            return true;
        }

        return false;
    }

    /**
     * Check is right expression format
     *
     * @param string $mathString
     * @return bool
     */
    private function isWrongFormat(string $mathString): bool
    {
        //example is - ((44+6)/(2*6))
        $strictMathStringPattern = '#^\(\(\d+(\+|-|/|\*)\d+\)(\+|-|/|\*)\(\d+(\+|-|/|\*)\d+\)\)$#';
        if (!preg_match($strictMathStringPattern, $mathString)) {
            return true;
        }

        return false;
    }
}
