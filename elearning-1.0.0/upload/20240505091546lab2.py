import itertools
def implies (a ,b):
    if a:
        return b
    else :
        return 1

def equivalent(a, b):
    return a==b

def ex2():
    P = [1,1,0,0]
    Q = [1,0,1,0]

    print('implies: ')
    print([implies(p,q) for p,q in zip(P,Q)])
    print('and: ')
    print(P and Q)
    print('or: ')
    print(P or Q)
    print('not P: ') 
    print([not p for p in P])
    print('xor: ')
    print([p^q for p,q in zip(P,Q)])
    print('equivalent: ')
    print([equivalent(p,q) for p,q in zip(P,Q)])
# ex2()

def ex3():
    table = list(itertools.product([0,1],repeat = 3))
    print(table)
    print('\np ^ q -> r')
    for item in table:
        print(implies(item[0] and item[1],item[2]))
    
    print('\nr -> p ^ q')
    for item in table:
        print(implies(item[2],item[0] and item[1]))

# ex3()

def ex4():
    P = [1,1,0,0]
    Q = [1,0,1,0]

    table = list(itertools.product([0,1],repeat = 4))
    print(table)

    print([implies(implies(p or q,p and q),not p or not q) for p,q in zip(P,Q)])


    for item in table:
        print(implies(not item[0] or( item[1] and item[2]),item[2]))

    for item in table:
        print(implies( item[0] ,item[1]) and implies(item[1] ,item[2]))


# ex4()
        
def ex5():
    P = [1,1,0,0]
    Q = [1,0,1,0]


    for p in P:
        if equivalent(p,not(not p)):
            print('equivalent')
        else:
            print('Inequivalent')
    print()

    for p,q in zip(P,Q):
        if equivalent(not(not q and p) and (q or p),p):
            print('equivalent')
        else:
            print('Inequivalent')
    print()

    for p,q in zip(P,Q):
        if equivalent(not(p or q) ,(not p or not q)):
            print('equivalent')
        else:
            print('Inequivalent')
    print()

    for p,q in zip(P,Q):
        if equivalent(not(p and q) ,(not p and not q)):
            print('equivalent')
        else:
            print('Inequivalent')
    print()

    for p,q in zip(P,Q):
        if equivalent(implies((p or not q),not p) ,implies((p or not q), not q)):
            print('equivalent')
        else:
            print('Inequivalent')
    print()

    for p,q in zip(P,Q):
        if equivalent(not(p or q),(not p and not q)):
            print('equivalent')
        else:
            print('Inequivalent')
    print()


# ex5()
def argument(a,b,c,d):
    if a and b and c:
        if not d:
            return "Invalid"
        else:
            return "Valid"
    else:
        return "Invalid"


def ex6():
    #[p,q,r,s]
    table = list(itertools.product([0,1],repeat = 4))
    print(table)
    print('a.')
    for item in table:
        print(argument(implies(item[0],item[2]),implies(not item[0],item[1]),implies(item[1],item[3]),implies(not item[3],item[2])))
    
    print('\nb.')
    for item in table:
        print(argument(implies(item[0],item[1]),(not item[2]) or item[3],item[0] or item[3],implies(not item[1],item[3])))
    

ex6()