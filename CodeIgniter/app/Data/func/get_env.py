def readENV():
    with open("ENV", "r") as file:
        ENV = file.readlines()
    data = {}
    for line in ENV:
        key = line.split("=", 1)[0].strip()
        value = line.split("=", 1)[1].strip()
        data[key] = value
    return data

def getENV(key):
    return readENV()[key]