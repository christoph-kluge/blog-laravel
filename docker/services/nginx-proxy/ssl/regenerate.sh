#!/usr/bin/env bash

CURRENT_DIR=$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )

openssl req -x509 -nodes -days 3650 -newkey rsa:2048 -keyout ${CURRENT_DIR}/server.key -out ${CURRENT_DIR}/server.crt -config ${CURRENT_DIR}/openssl.conf