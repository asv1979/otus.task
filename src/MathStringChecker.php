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
        $result = [
            'success' => true,
            'errMessage' => ''
        ];
        $wrongArgument = '#[a-z]#iu';
        try {
            if (preg_match($wrongArgument, $mathString)) {
                throw new \InvalidArgumentException('Only math symbols');
            }
        } catch (\InvalidArgumentException $e) {
            $result['success'] = false;
            $result['errMessage'] = $e->getMessage();

            return $result;
        }

        //((44+6)/(2*6))
        $strictMathStringPattern = '#^\(\(\d+(\+|-|/|\*)\d+\)(\+|-|/|\*)\(\d+(\+|-|/|\*)\d+\)\)$#';

        if (!preg_match($strictMathStringPattern, $mathString)) {
            $result['success'] = false;
            $result['errMessage'] = 'Error format';
        }

        return $result;
    }
}
