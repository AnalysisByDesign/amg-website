#!/bin/bash

echo "-- Container list -----------------------------------"
echo ""

docker container ls -a

echo ""
echo "-- Image list -----------------------------------"
echo ""

docker image ls

echo ""
echo "-- Directory list -----------------------------------"
echo ""

du -sch dbdata pmmdata/*
