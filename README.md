# RA-KMP-Search
The RA_KMP_search class provides an implementation of the Knuth-Morris-Pratt (KMP) algorithm
# Author: Roberto Aleman, ventics.com
# RA_KMP_search Class Documentation (PHP)

## Overview

The `RA_KMP_search` class provides an implementation of the Knuth-Morris-Pratt (KMP) algorithm, which is an efficient string searching algorithm. It allows you to find all occurrences of a given pattern within a text. The KMP algorithm optimizes the search process by pre-processing the pattern to determine the largest possible shift in case of a mismatch, thus avoiding redundant comparisons.

## Algorithm Explanation (Brief)

The Knuth-Morris-Pratt algorithm works by using information about the pattern itself to decide where to continue the search when a mismatch occurs. It pre-computes an array called the LPS (Longest Proper Prefix which is also a Suffix) array. For each index `i` in the pattern, `LPS[i]` stores the length of the longest proper prefix of the pattern that is also a suffix of the pattern up to index `i`. This information is then used during the search to efficiently shift the pattern when a mismatch happens in the text.

## Class Methods

### `public function search(string $text, string $pattern): array`

This method searches for all occurrences of the specified pattern within the given text using the KMP algorithm.

**Parameters:**

* `string $text`: The text to search within.
* `string $pattern`: The pattern to search for.

**Return Value:**

* `array`: An array containing integer values representing the starting index (0-based) of each occurrence of the pattern found in the text. If the pattern is not found, an empty array is returned.

**Example Usage:**

<hr>

require_once 'RA_KMP_search.php'; // Assuming the class is in a file named KMP_search.php

$kmpSearch = new RA_KMP_search();

$text1 = "ABABDABACDABABCABAB";
$pattern1 = "ABABCABAB";
$result1 = $kmpSearch-&gt;search($text1, $pattern1);

echo "Text: " . $text1 . "\n";
echo "Pattern: " . $pattern1 . "\n";
echo "Occurrences found at positions: ";
if (empty($result1)) {
echo "None\n";
} else {
echo implode(", ", $result1) . "\n";
}

echo "\n";

$text2 = "aaaaa";
$pattern2 = "aa";
$result2 = $kmpSearch-&gt;search($text2, $pattern2);

echo "Text: " . $text2 . "\n";
echo "Pattern: " . $pattern2 . "\n";
echo "Occurrences found at positions: ";
if (empty($result2)) {
echo "None\n";
} else {
echo implode(", ", $result2) . "\n";
}

echo "\n";

$text3 = "The quick brown fox jumps over the lazy fox.";
$pattern3 = "fox";
$result3 = $kmpSearch-&gt;search($text3, $pattern3);

echo "Text: " . $text3 . "\n";
echo "Pattern: " . $pattern3 . "\n";
echo "Occurrences found at positions: ";
if (empty($result3)) {
echo "None\n";
} else {
echo implode(", ", $result3) . "\n";
}
</hr>
 
------------------
# ATENTION!

If you require further explanation, I can assist you based on my availability and at an hourly rate.

If you need to implement this version or an advanced and/or customized version of my code in your system, I can assist you based on my availability and at an hourly rate. 

Do you need advice to implement an IT project, develop an algorithm to solve a real-world problem in your business, factory, or company?

Write me right now and I'll advise you.

Roberto Aleman, ventics.com
