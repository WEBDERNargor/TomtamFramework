@echo off
cd /d "%~dp0"

:: Run USBWebserver.exe minimized (in background)
start /min usbwebserver/usbwebserver.exe