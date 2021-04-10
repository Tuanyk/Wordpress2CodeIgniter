#!/usr/bin/env python3

import time
import argparse

parser = argparse.ArgumentParser(description="Add path...")
parser.add_argument("--sm", type=str, default="")
args = parser.parse_args()

with open("test.txt", "w") as file:
	file.write(args.sm) 

print("OK")

