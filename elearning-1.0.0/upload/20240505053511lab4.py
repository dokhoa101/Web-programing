import math
import sympy

def ex1():
    # Scenario (a)
    P = "Phong has Visa"
    S1 = "If Phong can fly, Phong will go to America"
    S2 = "If Phong has Visa, Phong will go to America"
    S3 = "If Phong can speak English, Phong will go to America"
    Conclusion = "Phong goes to America"

    # Proving Conclusion (a)
    print("P and S2 -> Conclusion")
    print("P: %s" % P)
    print("S2: %s" % S2)
    print("Conclusion: %s" % Conclusion)
    print()

    # Scenario (b)
    P = "It's hot yesterday"
    S1 = "If it's hot, it will rain the next day"
    S2 = "If and only if it's not rain, Nam goes outside"
    S3 = "If it's not hot, Nam will go outside"
    Conclusion = "Nam goes outside"

    # Proving Conclusion (b)
    print("P and S3 -> Conclusion")
    print("P: %s" % P)
    print("S3: %s" % S3)
    print("Conclusion: %s" % Conclusion)
    print()

    # Scenario (c)
    Q = "An wake up late"
    R = "The traffic is flowing smooth"
    S1 = "The traffic is always heavy on school day"
    S2 = "If An wake up late, he will be late for school on school day"
    S3 = "An only have to go to school on school day"
    S4 = "If An don't have to go to school, An can't be late for school"
    Conclusion = "An is late for school"

    # Proving Conclusion (c)
    print("Q, S2, S3, and S4 -> Conclusion")
    print("Q: %s" % Q)
    print("S2: %s" % S2)
    print("S3: %s" % S3)
    print("S4: %s" % S4)
    print("Conclusion: %s" % Conclusion)
    print()

    # Scenario (d)
    P = "∃x, y ∈ R,(x + y)2 ≤ x2 + y2"
    Q = "∀x, y ∈ Z+, x + y ≥ x + y"
    R = "∀x, y ∈ Z+, x + y + 2√xy ≥ x + y"
    T = "∀x, y ∈ Z+, √x + √y ≥ √x + y"
    S1 = "∀x, y ∈ Z+, x2 ≥ y2 → x ≥ y"
    S2 = "∀x, y ∈ Z+, x ≥ y → x2 ≥ y2"
    S3 = "∀x, y ∈ R+, x ≥ y → x2 ≥ y2"
    S4 = "∀x, y ∈ R+, x2 ≥ y2 → x ≥ y"
    Conclusion = "∀x, y ∈ Z+, √x + √y ≥ √x + y"

    # Proving Conclusion (d)
    print("Q, R, T, S1, S2, S3, and S4 -> Conclusion")
    print("Q: %s" % Q)
    print("R: %s" % R)
    print("T: %s" % T)
    print("S1: %s" % S1)
    print("S2: %s" % S2)
    print("S3: %s" % S3)
    print("S4: %s" % S4)
    print("Conclusion: %s" % Conclusion)

def ex2():
    # (a) ∃x ∈ Z, 0 ≤ x ≤ 100, x2 = 152 + 162
    found_a = False
    for x in range(101):
        if x**2 == 152 + 162:
            print("correct when x is", x)
            found_a = True
            break

    if not found_a:
        print("incorrect")

    # (b) ∃x ∈ Z, 0 ≤ x ≤ 100, x2 = 122 + 162
    found_b = False
    for x in range(101):
        if x**2 == 122 + 162:
            print("correct when x is", x)
            found_b = True
            break

    if not found_b:
        print("incorrect")

    # (c) ∃x ∈ Z, −50 ≤ x ≤ 50, x2 ≥ 99x
    found_c = False
    for x in range(-50, 51):
        if x**2 >= 99 * x:
            print(" correct when x is", x)
            found_c = True
            break

    if not found_c:
        print("incorrect")

    # (d) ∃x ∈ Z, 50 ≤ x ≤ 100, x(x + 1)(x + 2)%6 6= 0
    found_d = False
    for x in range(50, 101):
        if x * (x + 1) * (x + 2) % 6 != 0:
            print("correct when x is", x)
            found_d = True
            break

    if not found_d:
        print("incorrect")

    # (e) ∃x, y ∈ Z, 0 ≤ x ≤ 100, √x + y = √x + √y
    found_e = False
    for x in range(101):
        for y in range(101):
            if (x**0.5 + y) == (x**0.5 + y**0.5):
                print(" correct when x =", x, "and y =", y)
                found_e = True
                break
        if found_e:
            break

    if not found_e:
        print("incorrect")

def ex3():
    # (a) ¬(∀x ∈ Z, 0 ≤ x ≤ 100, x³ ≥ x)
    counterexample_a = None
    for x in range(101):
        if x**3 < x:
            counterexample_a = x
            break

    if counterexample_a is not None:
        print("The negated statement is incorrect. Counterexample: x =", counterexample_a)
    else:
        print("correct")

    # (b) ¬(∀x ∈ Z, 0 ≤ x ≤ 100, and x is even, x * 3 + 1 is a prime number)
    counterexample_b = None
    for x in range(0, 101, 2):
        if not sympy.isprime(x * 3 + 1):
            counterexample_b = x
            break

    if counterexample_b is not None:
        print("The negated statement is incorrect. Counterexample: x =", counterexample_b)
    else:
        print("correct")

    # (c) ¬(∀x ∈ Z, 1 ≤ x, y ≤ 100, and x is even, x * 5 + 3 is a prime number)
    counterexample_c = None
    for x in range(2, 101, 2):
        for y in range(1, 101):
            if not sympy.isprime(x * 5 + 3):
                counterexample_c = (x, y)
                break
        if counterexample_c is not None:
            break

    if counterexample_c is not None:
        print("The negated statement is incorrect. Counterexample: x =", counterexample_c[0])
    else:
        print("correct")

    # (d) ¬(∀c ∈ Z, 0 < c ≤ 100, c % 4 = 0, ∃a, b ∈ Z⁺, c² = a² + b²)
    counterexample_d = None
    for c in range(1, 101):
        if c % 4 == 0:
            found_solution = False
            for a in range(1, int(math.sqrt(c)) + 1):
                b_squared = c**2 - a**2
                if b_squared >= 1 and math.sqrt(b_squared).is_integer():
                    found_solution = True
                    break
            if not found_solution:
                counterexample_d = c
                break

    if counterexample_d is not None:
        print("The negated statement is incorrect. Counterexample: c =", counterexample_d)
    else:
        print("correct")

    # (e) ¬(∀c ∈ Z, 0 < c ≤ 100, c % 5 = 0, ∃a, b ∈ Z⁺, c² = a² + b²)
    counterexample_e = None
    for c in range(1, 101):
        if c % 5 == 0:
            found_solution = False
            for a in range(1, int(math.sqrt(c)) + 1):
                b_squared = c**2 - a**2
                if b_squared >= 1 and math.sqrt(b_squared).is_integer():
                    found_solution = True
                    break
            if not found_solution:
                counterexample_e = c
                break

    if counterexample_e is not None:
        print("The negated statement is incorrect. Counterexample: c =", counterexample_e)
    else:
        print("correct")

    # (f) ¬(∃c ∈ Z, 0 < c ≤ 100, c² ≤ c)
    counterexample_f = None
    for c in range(1, 101):
        if c**2 <= c:
            counterexample_f = c
            break

    if counterexample_f is not None:
        print("The negated statement is incorrect. Counterexample: c =", counterexample_f)
    else:
        print("correct")

def ex5():
    G1="p"
    G2="~r - >~p"
    G3="G2 ->’p->r ’, contrapositive "
    C="G1 + G3 -> C=’r’"
    print ("G1=%s"%( G1 ))
    print ("G2=%s"%( G2 ))
    print ("G3=%s"%( G3 ))
    print ("%s"%( C))