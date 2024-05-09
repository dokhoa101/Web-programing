import itertools
import math


def ex1():
    P = "You get a good grade in the midterm exam"
    Q = "You understand how to solve all the exercises in the book"

    statement_a = f"(Q -> P) and (P -> Q)"
    statement_b = f"Q and not P"
    statement_c = f"Q -> P"

    print("Statement (a):", statement_a)
    print("Statement (b):", statement_b)
    print("Statement (c):", statement_c)


def ex2():
    print('If you understand how to solve all the exercises in the book, then you will get a good grade in the midterm exam, and you will get a good grade in the midterm exam if and only if you understand how to solve all the exercises in the book.')
    print('You understand how to solve all the exercises in the book if you did not get a good grade in the midterm exam.')
    print('You will get a good grade in the midterm exam if and only if you understand how to solve all the exercises in the book.')

def ex3():
    print('Negation: You understand how to solve all the exercises in the book, but you did not get a good grade in the midterm exam, and you did not get a good grade in the midterm exam if you understand how to solve all the exercises in the book.')
    print('Converse: If you get a good grade in the midterm exam, then you understand how to solve all the exercises in the book, and if you get a good grade in the midterm exam, it means you understand how to solve all the exercises in the book.')
    print('Contrapositive: If you do not understand how to solve all the exercises in the book, then you will not get a good grade in the midterm exam, and if you do not understand how to solve all the exercises in the book, you will not get a good grade in the midterm exam.')

def ex4():
    # Part (a)
    P = "Phong has Visa"
    Q = "Phong can fly"
    R = "Phong can speak English"
    T = "Phong goes to America"

    S1 = f"{Q} -> {T}"
    S2 = f"{P} -> {T}"
    S3 = f"{R} -> {T}"

    C = T

    print("Part (a):")
    print(f"1. {S1}")
    print(f"2. {S2}")
    print(f"3. {S3}")
    print(f"   C: {C}\n")

    # Part (b)
    P = "An wakes up late"
    Q = "The traffic is flowing smooth"
    R = "School day"
    S = "An has to go to school"
    V = "An is late for school"

    S1 = f"{R} -> not {Q}"
    S2 = f"{P} -> {V}"
    S3 = f"{R} -> {S}"
    S4 = f"not {S} -> not {V}"

    C = V

    print("Part (b):")
    print(f"1. {S1}")
    print(f"2. {S2}")
    print(f"3. {S3}")
    print(f"4. {S4}")
    print(f"   C: {C}")

def ex5():

    props = ['P', 'Q', 'R']

    # Generate all possible combinations of truth values for P, Q, and R
    combinations = list(itertools.product([True, False], repeat=len(props)))

    # Define the statements
    def statement_1(P, Q, R):
        return Q <= R

    def statement_2(P, Q, R):
        return P <= Q

    def conclusion(P, Q, R):
        return statement_1(P, Q, R) and statement_2(P, Q, R)

    # Print the header of the truth table
    print("| P    | Q    | R    | P -> Q | Q -> R | P -> R | Conclusion |")

    # Iterate through each combination of truth values
    for combo in combinations:
        P, Q, R = combo
        result_PQ = statement_2(P, Q, R)
        result_QR = statement_1(P, Q, R)
        result_PR = conclusion(P, Q, R)
        print(f"| {int(P)} | {int(Q)} | {int(R)} | {int(result_PQ)} | {int(result_QR)} | {int(result_PR)} | {int(result_PR)} |")

A = [
    [2, 0, 5, 0, 3, 0],
    [3, 0, 0, 0, 0, 0],
    [0, 6, 2, 0, 5, 0],
    [3, 0, 9, 0, 25, 0],
    [0, 0, 2, 4, 5, 0],
    [0, 0, 0, 0, 0, 5]
]

def isOdd(a):
    return a % 2 != 0

def isPrime(a):
    if a <= 1:
        return False
    for i in range(2, int(math.sqrt(a)) + 1):
        if a % i == 0:
            return False
    return True

def isSquare(a):
    return math.sqrt(a).is_integer()

def isGreater(a, b):
    return a > b

def isEqual(a, b):
    return a == b

def isAbove(a, b):
    return A[a[0]][a[1]] < A[b[0]][b[1]]

def isLeftOf(a, b):
    return a[1] < b[1]

def statement_a():
    for row in range(len(A)):
        for col in range(len(A[0])):
            if not isOdd(A[row][col]) and isPrime(A[row][col]):
                return True
    return False

def statement_b():
    for row in range(len(A)):
        for col in range(len(A[0])):
            if isOdd(A[row][col]) and not isSquare(A[row][col]):
                return False
    return True

def statement_c():
    for row in range(len(A)):
        for col in range(len(A[0])):
            if isOdd(A[row][col]) and not isGreater(A[row][col], 2):
                return False
    return True

def statement_d():
    for row in range(len(A)):
        for col in range(len(A[0])):
            if isPrime(A[row][col]) and (isGreater(A[row][col], 3) or isEqual(A[row][col], 3)):
                return False
    return True

def statement_e():
    for a_row in range(len(A)):
        for a_col in range(len(A[0])):
            a = (a_row, a_col)
            for b_row in range(len(A)):
                for b_col in range(len(A[0])):
                    b = (b_row, b_col)
                    if isLeftOf(a, b):
                        return True
    return False

def statement_f():
    for a_row in range(len(A)):
        for a_col in range(len(A[0])):
            a = (a_row, a_col)
            for b_row in range(len(A)):
                for b_col in range(len(A[0])):
                    b = (b_row, b_col)
                    if isGreater(A[a_row][a_col], A[b_row][b_col]) and isAbove(a, b):
                        return False
    return True

def statement_g():
    for a_row in range(len(A)):
        for a_col in range(len(A[0])):
            a = (a_row, a_col)
            for b_row in range(len(A)):
                for b_col in range(len(A[0])):
                    b = (b_row, b_col)
                    if isPrime(A[a_row][a_col]) and not isOdd(A[a_row][a_col]) and isOdd(A[b_row][b_col]) and isAbove(a, b):
                        return True
    return False

def statement_h():
    for a_row in range(len(A)):
        for a_col in range(len(A[0])):
            a = (a_row, a_col)
            for b_row in range(len(A)):
                for b_col in range(len(A[0])):
                    b = (b_row, b_col)
                    if isSquare(A[a_row][a_col]) and not isOdd(A[a_row][a_col]) and isOdd(A[b_row][b_col]) and isEqual(A[a_row][a_col], A[b_row][b_col]) and isLeftOf(b, a):
                        return True
    return False

def ex6():
    print("Statement (a) is", statement_a())
    print("Statement (b) is", statement_b())
    print("Statement (c) is", statement_c())
    print("Statement (d) is", statement_d())
    print("Statement (e) is", statement_e())
    print("Statement (f) is", statement_f())
    print("Statement (g) is", statement_g())
    print("Statement (h) is", statement_h())
ex6()