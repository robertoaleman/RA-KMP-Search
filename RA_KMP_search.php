<?php

class RA_KMP_search
{
    /**

     * The RA_KMP_search class provides an implementation of the Knuth-Morris-Pratt (KMP) algorithm
	 * Author: Roberto Aleman, ventics.com
     * Calculates the LPS (Longest Proper Prefix which is also a Suffix) array for the pattern.
     *
     * @param string $pattern The pattern to preprocess.
     * @return array The LPS array.
     */
    private function calculateLPS(string $pattern): array
    {
        $m = strlen($pattern);
        $lps = array_fill(0, $m, 0);
        $previousLongestPrefix = 0; // length of the previous longest prefix which is also a suffix
        $i = 1;

        while ($i < $m) {
            if ($pattern[$i] === $pattern[$previousLongestPrefix]) {
                $previousLongestPrefix++;
                $lps[$i] = $previousLongestPrefix;
                $i++;
            } else {
                if ($previousLongestPrefix !== 0) {
                    $previousLongestPrefix = $lps[$previousLongestPrefix - 1];
                    // Note that we do not increment $i here
                } else {
                    $lps[$i] = 0;
                    $i++;
                }
            }
        }
        return $lps;
    }

    /**
     * Searches for all occurrences of a pattern in a text using the KMP algorithm.
     * @param string $text The text where the pattern will be searched.
     * @param string $pattern The pattern to search for.
     * @return array An array with the starting positions of all occurrences found.
     */
    public function search(string $text, string $pattern): array
    {
        $n = strlen($text);
        $m = strlen($pattern);

        if ($m === 0) {
            return []; // Empty pattern matches everywhere, but well return an empty array for simplicity
        }

        $lps = $this->calculateLPS($pattern);
        $i = 0; // index for text $text
        $j = 0; // index for pattern $pattern
        $occurrences = [];

        while ($i < $n) {
            if ($pattern[$j] === $text[$i]) {
                $i++;
                $j++;
            }

            if ($j === $m) {
                $occurrences[] = $i - $j; // Found an occurrence at position $i - $j
                $j = $lps[$j - 1]; // Prepare to search for the next possible occurrence
            } else if ($i < $n && $pattern[$j] !== $text[$i]) {
                // Mismatch after $j matches
                if ($j !== 0) {
                    $j = $lps[$j - 1];
                } else {
                    $i++;
                }
            }
        }
        return $occurrences;
    }
}

// Sample Data Usage:
$kmpSearch = new RA_KMP_search();

$text1 = "123456789ABABCABAB";
$pattern1 = "ABA";
$result1 = $kmpSearch->search($text1, $pattern1);

echo "Text: " . $text1 . "<br/>";
echo "Pattern: " . $pattern1 . "<br/>";
echo "Occurrences found at positions: ";
if (empty($result1)) {
    echo "None<br/>";
} else {
    echo implode(", ", $result1) . "<br/>";
}

echo "<br/>";

$text2 = "aaaaa";
$pattern2 = "aa";
$result2 = $kmpSearch->search($text2, $pattern2);

echo "Text: " . $text2 . "<br/>";
echo "Pattern: " . $pattern2 . "<br/>";
echo "Occurrences found at positions: ";
if (empty($result2)) {
    echo "None<br/>";
} else {
    echo implode(", ", $result2) . "<br/>";
}

echo "<br/>";

$text3 = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem arcu orci, consequat eget pharetra eu, Lorem  eget diam.
Cras vel ligula enim. Nullam non magna id metus eleifend interdum a sed justo. Lorem vestibulum lorem sit amet lorem feugiat,
at commodo ligula consequat. Donec condimentum tortor nec urna aliquet, Lorem amet vehicula erat cursus. Integer eleifend,
Lorem nec fringilla condimentum, sapien nibh luctus leo, a mattis felis nulla et augue. Nunc sodales venenatis ex.
Lorem porta mauris mi, quis tempor arcu sollicitudin ut.";
$pattern3 = "Lorem";
$result3 = $kmpSearch->search($text3, $pattern3);

echo "Text: " . $text3 . "<br/>";
echo "Pattern: " . $pattern3 . "<br/>";
echo "Occurrences found at positions: ";
if (empty($result3)) {
    echo "None<br/>";
} else {
    echo implode(", ", $result3) . "<br/>";
}

?>