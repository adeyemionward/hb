package main

import (
	"fmt"
)

func RepeatAlpha(s string) string {
	result := ""
	
	for _, c:= range s {
		repeat := 1
	    if(c >= 'a' && c <= 'z'){
			repeat = int(c-'a') + 1
	    }

	    if(c >= 'A' && c <= 'Z'){
			repeat = int(c-'A') + 1
	    }
	     
        for j := 1;  j <= repeat; j++ {
			result += string(c)
	    }
	}
	return result
}

package main

import (
	"fmt"
)



func ConcatAlternate(slice1, slice2 []int) []int {
    // PHASE 1: The "Who Goes First?" Selection
    first := slice1
    second := slice2

    // Rule: Start with the longest. If equal, start with slice1.
    if len(slice2) > len(slice1) {
        first = slice2
        second = slice1
    }

    result := []int{}
    i := 0

    // PHASE 2: The Zipper (Alternating)
    // This loop runs ONLY as long as BOTH slices have items left.
    for i < len(first) && i < len(second) {
        result = append(result, first[i])  // Take from the Leader
        result = append(result, second[i]) // Take from the Follower
        i++ 
    }

    // PHASE 3: The Cleanup (Leftovers)
    // This loop picks up whatever is left in the longer slice.
    for i < len(first) {
        result = append(result, first[i])
        i++
    }

    return result
}

package main

import (
	"fmt"
)


func CamelToSnakeCase(s string) string{
	if(len(s) == 0){
		return ""
	}
	runes := []rune(s)
	result := ""
	
	for i, r := range s{
	 if ( r < 'a' || r > 'z') && (r < 'A' || r > 'Z' ) {
			return s
		}
	 if i > 0 && r >= 'A' && r <= 'Z' && s[i-1] >= 'A' && s[i-1] <= 'Z' {
			return s
		}
	}

	
	
	last := s[len(s)-1]
	if last >= 'A' && last <= 'Z' {
		return s
	}

	

	for i, r := range runes{
		if(r >= 'A' && r <= 'Z'){
			if(i != 0){
				result += "_"
			}
			result += string(r )
		}else{
			result += string(r)
		}		
	}

	return  result
}



func FishAndChips(n int) string {
	if n < 0 {
		return "error: number is negative."
	}
	if n%2 == 0 && n%3 == 0 {
		return "fish and chips"
	}else if( n%2 ==0 ){
	return "fish"
	}else if(n%3 == 0){
		return "chips"
	}else{
		return "not divisible by 2 or 3"
	}
}



// Chunk splits a slice into sub-slices of a specific size.
func Chunk(slice []int, size int) {
	// 1. The "Zero" Guard
	if size <= 0 {
		fmt.Println()
		return
	}

	// 2. The "Master Container"
	var result [][]int

	// 3. The "Jumping" Loop
	for i := 0; i < len(slice); i += size {
		end := i + size

		// 4. The "Safety Cap"
		if end > len(slice) {
			end = len(slice)
		}

		// 5. The "Slicing" Action
		result = append(result, slice[i:end])
	}

	// 6. Final Output
	fmt.Println(result)
}

package main

import (
	"fmt"
)

func ConcatSlice(slice1, slice2 []int) []int {
	// We take slice1 and "spread" all elements of slice2 into it
	result := append(slice1, slice2...)
	return result
}



func DigitLen(n, base int) int {
 	if(base < 2 || base > 36){
		return -1
	}
	if(n < 0){
		n = -n // n = n * -1
	}
	
	count := 0
	for n > 0 {
	     	n = n/base
		  count++
	
	}
	return count
}


func FirstWord(s string) string {
    start :=  -1
    for i, chr := range s {
		if chr != ' ' && start == -1 {
			start = i
		}

	
		if chr == ' ' && start != -1 {
			return s[start:i] + "\n"
		}
		
    }
	if start == -1 {
		return "\n"
	}


    return  s[start:] + "\n"
}

func FromTo(from int, to int) string {
	// 1. Validation
	if from < 0 || from > 99 || to < 0 || to > 99 {
		return "Invalid\n"
	}

	result := ""
	current := from

	for {
		// 2. Convert integer to two-digit string manually
		result += string(rune(current/10 + '0'))
		result += string(rune(current%10 + '0'))

		// 3. Exit condition
		if current == to {
			break
		}

		// 4. Add separator
		result += ", "

		// 5. Increment or Decrement
		if from < to {
			current++
		} else {
			current--
		}
	}

	return result + "\n"
}


func Gcd(a, b uint) uint {
 if a == 0 || b == 0 {
return 0
}

for b != 0{
a,b = b,a%b

}
return a
}


package main
import (
	"fmt"	
)

func HashCode(dec string) string {	
	length := len(dec)
	hashed := ""
	for _, chr := range dec {
		h := int(chr) + length % 127
		if (chr < 32){
			h+= 33
		}
		hashed += string(rune(h))
	}
	return hashed	
}


func HashCode(dec string) string {	
	length := len(dec)
	hashed := ""
	for _, chr := range dec {
		h := int(chr) + length % 127
		if (chr < 32){
			h+= 33
		}
		hashed += string(rune(h))
	}
	return hashed	
}


func IsCapitalized(s string) bool {
	if(len(s) == 0){
		return false
	}
	isWord := false
	for _, c := range s {

		if c != ' ' && !isWord {
				isWord = true
			if(c >= 'a' && c <= 'z') {
			return false
			}
		}
		if isWord && c == ' ' {
			isWord = false
		}

	}
	
	return true
}


func Itoa(n int) string {
	if n == 0 {
		return "0"
	}

	negative := false
	if n < 0 {
		negative = true
		n = -n
	}

	s := ""
	for n > 0 {
		digit := n % 10
		s = string(rune('0'+digit)) + s // prepend digit
		n = n / 10
	}

	if negative {
		s = "-" + s
	}

	return s
}

func LastWord(s string) string {
    lastWord := ""
    currentWordStart := -1

    for i, chr := range s {
        // 1. Found the start of a word
        if chr != ' ' && currentWordStart == -1 {
            currentWordStart = i
        }

        // 2. Found the end of a word (hit a space)
        if chr == ' ' && currentWordStart != -1 {
            lastWord = s[currentWordStart:i]
            currentWordStart = -1 // Reset the "bucket" to look for the next word
        }
    }

    // 3. Final Check: If the string didn't end with a space, 
    // the very last word is still in our "currentWordStart" bucket.
    if currentWordStart != -1  {
        lastWord = s[currentWordStart:]
    }

    if lastWord == "" {
        return "\n"
    }

    return lastWord + "\n"
}

func FindPrevPrime(nb int) int {
	// Check each number from nb down to 2
	for i := nb; i >= 2; i-- {
		isPrime := true
		// Check if i is divisible by any number from 2 to i-1
		for j := 2; j < i; j++ {
			if i%j == 0 {
				isPrime = false
				break
			}
		}
		if isPrime {
			return i
		}
	}
	return 0
}

// RECOV
func main() {
    // We use integers 0-9 instead of characters '0'-'9'
    for a := 9; a >= 0; a-- {
        for b := a - 1; b >= 0; b-- {
            for c := b - 1; c >= 0; c-- {
                
                // Print the combination
                fmt.Print(a, b, c)

                // Check: Are we at the very last combination?
                // If NOT, print the comma and space
                if !(a == 2 && b == 1 && c == 0) {
                    fmt.Print(", ")
                }
            }
        }
    }
    // Print one final newline at the very end
    fmt.Println()
}

func ThirdTimeIsACharm(str string) string {
	// 1. Check if the string is too short (less than 3 characters)
	// This also handles the empty string case.
	if len(str) < 3 {
		return "\n"
	}

	result := ""

	// 2. Loop through the string
	// We start at index 2 (the 3rd character) and skip 3 every time
	for i := 2; i < len(str); i += 3 {
		result += string(str[i])
	}

	// 3. Add the required newline to the final collection
	return result + "\n"
}

func ZipString(s string) string {
	if s == "" {
		return ""
	}

	result := ""
	count := 1

	// We loop from the first character to the second-to-last
	for i := 0; i < len(s)-1; i++ {
		// Compare current character with the next one
		if s[i] == s[i+1] {
			count++
		} else {
			// They are different! Save the count and the character
			result += fmt.Sprintf("%d%c", count, s[i])
			// Reset for the new character
			count = 1
		}
	}

	// Step 3: Add the very last character group
	result +=  fmt.Sprintf("%d%c", count, s[len(s)-1])

	return result
}

func FifthAndSkip(str string) string {
	if str == "" {
		return "\n"
	}

	// 1. Remove ALL original spaces first
	clean := ""
	for _, c := range str {
		if c != ' ' {
			clean += string(c)
		}
	}

	// 2. Check the length of the CLEAN string
	if len(clean) < 5 {
		return "Invalid Input\n"
	}

	result := ""
	count := 0
	// 3. Use i loop to allow manual skipping
	for i := 0; i < len(clean); i++ {
		result += string(clean[i])
		count++

		if count == 5 {
			// If there's a character at i+1, it's the 6th one. Skip it!
			if i+1 < len(clean) {
				result += " "
				i++ // The Skip
			}
			count = 0
		}
	}

	return result + "\n"
}



func NotDecimal(dec string) string {
    if dec == "" {
        return "\n"
    }

    dotIdx := -1
    hasDigits := false

    for i, num := range dec {
        if num == '.' {
            // Check if we already found a dot (only one allowed)
            if dotIdx != -1 {
                return dec + "\n"
            }
            dotIdx = i
            continue
        }
        if num == '-' {
            // Minus must be at the very start
            if i != 0 {
                return dec + "\n"
            }
            continue
        }
        if num < '0' || num > '9' {
            return dec + "\n" // Not a number
        }
        hasDigits = true
    }

    // If no digits or no dot, return as is
    if !hasDigits || dotIdx == -1 {
        return dec + "\n"
    }

    // Split it
    before := dec[:dotIdx]
    after := dec[dotIdx+1:]

    // SPECIAL RULE: If after the dot is ONLY zeros (like 174.0 or 174.000)
    onlyZeros := true
    for _, r := range after {
        if r != '0' {
            onlyZeros = false
            break
        }
    }
    
    // If it's just "174.0", return "174"
    if onlyZeros {
        return before + "\n"
    }

    // The "Glue": join them and convert to remove leading zeros (like "01" -> "1")
    // Keep the minus sign if it exists!
    combined := before + after
    
    // Atoi handles "-0125" -> "-125" automatically!
    val, _ := strconv.Atoi(combined)
    
    // BUT! strconv.Itoa(-0) becomes "0". 
    // If the original started with "-0.", Itoa might lose the "-"
    res := strconv.Itoa(val)
    if combined[0] == '-' && res[0] != '-' && val == 0 {
        return "-0\n" // Rare case edge case
    }

    return res + "\n"
}

func RevConcatAlternate(slice1, slice2 []int) []int {
	res := []int{}
	len1 := len(slice1)
	len2 := len(slice2)

	// Keep going as long as there is a block in either stack
	for len1 > 0 || len2 > 0 {
		if len1 > len2 {
			// Slice1 is longer, take from the end of Slice1
			res = append(res, slice1[len1-1])
			len1--
		} else if len2 > len1 {
			// Slice2 is longer, take from the end of Slice2
			res = append(res, slice2[len2-1])
			len2--
		} else {
			// They are equal! Take from Slice1 then Slice2
			res = append(res, slice1[len1-1])
			res = append(res, slice2[len2-1])
			len1--
			len2--
		}
	}
	return res
}

func Slice(a []string, nbrs ...int) []string {
	l := len(a)
	if l == 0 {
		return nil
	}

	start := nbrs[0]
	end := l

	// If they gave us a second number, use it as the end
	if len(nbrs) > 1 {
		end = nbrs[1]
	}

	// Turn negative "secret codes" into real positions
	if start < 0 {
		start = l + start
	}
	if end < 0 {
		end = l + end
	}

	// Safety checks: don't go out of bounds!
	if start < 0 {
		start = 0
	}
	if end > l {
		end = l
	}

	// If start is after end, it's impossible to cut!
	if start >= end {
		return nil
	}

	return a[start:end]
}



// FIND PAIRS
package main

import (
	"fmt"
	"os"
	"strconv"
)

func main() {
	// 1. Basic Argument Check
	if len(os.Args) != 3 {
		fmt.Println("Invalid input.")
		return
	}

	argArr := os.Args[1]
	argTarget := os.Args[2]

	// 2. Manual Bracket Check
	if len(argArr) < 2 || argArr[0] != '[' || argArr[len(argArr)-1] != ']' {
		fmt.Println("Invalid input.")
		return
	}

	// 3. The Manual Scanner
	var nums []int
	currentNumStr := ""

	// Loop through everything INSIDE the brackets
	for i := 1; i < len(argArr)-1; i++ {
		char := argArr[i]

		// If it's a number or a minus sign, add it to our temporary string
		if (char >= '0' && char <= '9') || char == '-' {
			currentNumStr += string(char)
		} else if char == ',' {
			// We hit a comma! Time to convert the number we found
			if currentNumStr != "" {
				n, err := strconv.Atoi(currentNumStr)
				if err != nil {
					fmt.Printf("Invalid number: %s\n", currentNumStr)
					return
				}
				nums = append(nums, n)
				currentNumStr = "" // Empty the "holding area"
			}
		} else if char == ' ' {
			continue // Just ignore spaces
		} else {
			// If we see 'p' or anything else that isn't a number/comma/space
			fmt.Printf("Invalid number: %c\n", char)
			return
		}
	}

	// 4. Grab the LAST number (because there is no comma after the last number!)
	if currentNumStr != "" {
		n, err := strconv.Atoi(currentNumStr)
		if err != nil {
			fmt.Printf("Invalid number: %s\n", currentNumStr)
			return
		}
		nums = append(nums, n)
	}

	// 5. Convert the Target Sum
	targetSum, err := strconv.Atoi(argTarget)
	if err != nil {
		fmt.Println("Invalid target sum.")
		return
	}

	// 6. The "Two-Finger Search" (Logic stays the same!)
	var pairs [][]int
	for i := 0; i < len(nums); i++ {
		for j := i + 1; j < len(nums); j++ {
			if nums[i]+nums[j] == targetSum {
				pairs = append(pairs, []int{i, j})
			}
		}
	}

	// 7. Final Result
	if len(pairs) == 0 {
		fmt.Println("No pairs found.")
	} else {
		fmt.Printf("Pairs with sum %d: %v\n", targetSum, pairs)
	}
}


// REVSERSE STRING
package main

import (
	"os"
	"fmt"
)

func main() {
	// Step 1: Check argument count
	// os.Args[0] is the program name; we need exactly one more argument.
	if len(os.Args) != 2 {
		return
	}

	str := os.Args[1]
	if str == "" {
		return
	}

	// Step 2: Manually split the string into words
	// Since the subject says words are separated by exactly one space
	var words []string
	currentWord := ""

	for _, char := range str {
		if char == ' ' {
			if currentWord != "" {
				words = append(words, currentWord)
				currentWord = ""
			}
		} else {
			currentWord += string(char)
		}
	}
	// Append the last word since there is no space at the end
	if currentWord != "" {
		words = append(words, currentWord)
	}

	// Step 3: Print words in reverse order
    for i := len(words) - 1; i >= 0; i-- {
        // Print the word directly (fmt knows how to print strings)
        fmt.Print(words[i])

        // Print a space between words, using double quotes " " for a string
        if i > 0 {
            fmt.Print(" ")
        }
    }

    // Step 4: Final newline using double quotes
    fmt.Print("\n")

	// Step 4: Final newline as required
	// fmt.Println()
}

// ROTATE STRING

package main

import (
	"os"
	"fmt"
)

func main() {
	// Step 1: Check if there is exactly one argument
	if len(os.Args) != 2 {
		if len(os.Args) != 1 { // Only print newline if it's not just the program name
			fmt.Println()
		}
		return
	}

	str := os.Args[1]
	var words []string
	currentWord := ""

	// Step 2: Extract words (Handling multiple spaces)
	for _, char := range str {
		if char == ' ' {
			if currentWord != "" {
				words = append(words, currentWord)
				currentWord = ""
			}
		} else {
			currentWord += string(char)
		}
	}
	// Don't forget the last word!
	if currentWord != "" {
		words = append(words, currentWord)
	}

	// Step 3: Handle the rotation and printing
	if len(words) > 0 {
		// Print from the second word (index 1) to the end
		for i := 1; i < len(words); i++ {
			for _, r := range words[i] {
				fmt.Print(string(r))
			}
			// fmt.Print(words[i]) // fmt.Print can print the whole word at once
          
			fmt.Print(" ") // Space after each middle word
		}

		// Finally, print the first word (index 0)
		for _, r := range words[0] {
			fmt.Print(string(r))
		}
	}

	// Step 4: Always end with a newline
	fmt.Print("\n")
}

// WORDFLIP
package main
import "fmt"


func WordFlip(str string) string {
	// Step 1: Manual split while ignoring extra spaces
	var words []string
	currentWord := ""

	for _, char := range str {
		if char == ' ' {
			if currentWord != "" {
				words = append(words, currentWord)
				currentWord = ""
			}
		} else {
			currentWord += string(char)
		}
	}
	// Add the final word if the bucket isn't empty
	if currentWord != "" {
		words = append(words, currentWord)
	}

	// Step 2: Check if we actually found any words
	if len(words) == 0 {
		return "Invalid Output\n"
	}

	// Step 3: Build the reversed string
	result := ""
	for i := len(words) - 1; i >= 0; i-- {
		result += words[i]
		
		// Add a space between words, but not after the very last one
		if i > 0 {
			result += " "
		}
	}

	// Step 4: Return the final string with a newline
	return result + "\n"
}


func main() {
	fmt.Print(WordFlip("First second last"))
	fmt.Print(WordFlip(""))
	fmt.Print(WordFlip("     "))
	fmt.Print(WordFlip(" hello  all  of  you! "))
}


func PrintMemory(arr [10]byte) {
	hexChars := "0123456789abcdef"

	// --- HEX DISPLAY (4 per line) ---
	for i := 0; i < len(arr); i++ {

		firstDigit := arr[i] / 16
		secondDigit := arr[i] % 16

		z01.PrintRune(rune(hexChars[firstDigit]))
		z01.PrintRune(rune(hexChars[secondDigit]))

		// Space if not end of line or last element
		if (i+1)%4 != 0 && i != len(arr)-1 {
			z01.PrintRune(' ')
		}
        
		// New line every 4 bytes
		if (i+1)%4 == 0 {
			z01.PrintRune('\n')
		}
	}

	// If last line not complete
	if len(arr)%4 != 0 {
		z01.PrintRune('\n')
	}

	// --- ASCII DISPLAY ---
	for i := 0; i < len(arr); i++ {
		if arr[i] >= 32 && arr[i] <= 126 {
			z01.PrintRune(rune(arr[i]))
		} else {
			z01.PrintRune('.')
		}
	}
	z01.PrintRune('\n')
}

// union
func alreadySeen(str string, c rune, index int) bool {
	for i := 0; i < index; i++ {
		if rune(str[i]) == c {
			return true
		}
	}
	return false
}

func main() {
	if len(os.Args) != 3 {
		z01.PrintRune('\n')
		return
	}

	s1 := os.Args[1]
	s2 := os.Args[2]

	// check first string
	for i, c := range s1 {
		if !alreadySeen(s1, c, i) {
			z01.PrintRune(c)
		}
	}

	// check second string
	for i, c := range s2 {
		if !alreadySeen(s1+s2, c, len(s1)+i) {
			z01.PrintRune(c)
		}
	}

	z01.PrintRune('\n')
}
// end union


<!-- inter 1 -->
 package main

import (
	"os"
	"github.com/01-edu/z01"
)

func main() {
	// 1. Check if there are exactly 2 arguments
	args := os.Args[1:]
	if len(args) != 2 {
		return
	}

	str1 := args[0]
	str2 := args[1]

	// 2. Map to keep track of characters we already printed
	seen := make(map[rune]bool)

	// 3. Loop through the first string
	for _, char1 := range str1 {
		
		// Only proceed if we haven't printed this char before
		if !seen[char1] {
			
			// 4. Check if char1 exists anywhere in the second string
			for _, char2 := range str2 {
				if char1 == char2 {
					// We found a match! Print it and mark as seen
					z01.PrintRune(char1)
					seen[char1] = true
					break // Stop looking in str2, move to next char in str1
				}
			}
		}
	}
	
	// 5. Always end with a newline
	z01.PrintRune('\n')
}

<!-- inter 2 -->
 package main

import (
	"os"
	"github.com/01-edu/z01"
)

func main() {
	args := os.Args[1:]
	if len(args) != 2 {
		return
	}

	str1 := args[0]
	str2 := args[1]

	for i := 0; i < len(str1); i++ {
		// --- STEP 1: Check if we already handled this character ---
		alreadyProcessed := false
		for j := 0; j < i; j++ {
			if str1[i] == str1[j] {
				alreadyProcessed = true
				break
			}
		}

		// If it's a duplicate in str1, skip it
		if alreadyProcessed {
			continue
		}

		// --- STEP 2: Check if it exists in the second string ---
		for k := 0; k < len(str2); k++ {
			if str1[i] == str2[k] {
				z01.PrintRune(rune(str1[i]))
				break // Found it! Stop looking in str2
			}
		}
	}
	z01.PrintRune('\n')
}

 <!-- we are unique -->
  func WeAreUnique(str1, str2 string) int {
	// If both are empty, return -1
	if str1 == "" && str2 == "" {
		return -1
	}

	count := 0

	// --- CHECK STR1 AGAINST STR2 ---
	for i := 0; i < len(str1); i++ {
		// Check if we've already processed this character in str1 (avoid duplicates)
		isDuplicate := false
		for prev := 0; prev < i; prev++ {
			if str1[i] == str1[prev] {
				isDuplicate = true
				break
			}
		}
		if isDuplicate {
			continue
		}

		// Check if str1[i] exists in str2
		foundInOther := false
		for j := 0; j < len(str2); j++ {
			if str1[i] == str2[j] {
				foundInOther = true
				break
			}
		}

		// If it's NOT in the other string, it's unique!
		if !foundInOther {
			count++
		}
	}

	// --- CHECK STR2 AGAINST STR1 ---
	for i := 0; i < len(str2); i++ {
		// Check if we've already processed this character in str2
		isDuplicate := false
		for prev := 0; prev < i; prev++ {
			if str2[i] == str2[prev] {
				isDuplicate = true
				break
			}
		}
		if isDuplicate {
			continue
		}

		// Check if str2[i] exists in str1
		foundInOther := false
		for j := 0; j < len(str1); j++ {
			if str2[i] == str1[j] {
				foundInOther = true
				break
			}
		}

		// If it's NOT in the other string, it's unique!
		if !foundInOther {
			count++
		}
	}

	return count
}