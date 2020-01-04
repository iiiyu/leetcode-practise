package main

func romanToInt(s string) int {
	romanToIntMap := map[rune]int{
		'I': 1,
		'V': 5,
		'X': 10,
		'L': 50,
		'C': 100,
		'D': 500,
		'M': 1000,
	}

	runeArray := []rune(s)
	previousNumber := 0
	sum := 0
	for i := 0; i < len(runeArray); i = i + 1 {
		if romanToIntMap[runeArray[i]] > previousNumber {
			sum = sum - 2 * previousNumber + romanToIntMap[runeArray[i]]
			previousNumber = romanToIntMap[runeArray[i]]
		} else {
			sum = sum + romanToIntMap[runeArray[i]]
			previousNumber = romanToIntMap[runeArray[i]]
		}
	}
	return sum
}
