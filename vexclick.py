
from time import sleep
import keyboard
import pyautogui


pos = pyautogui.position()
cancel = False

stop = False
pause = False

def reset():
    global stop
    global pause
    global pos
    global cancel

    pos = pyautogui.position()
    pyautogui.moveTo(1149, 683)
    pyautogui.click(1149, 683)
    pyautogui.moveTo(pos)
       
    pyautogui.moveTo(1149, 629)
    pyautogui.click(1149, 629)
    pyautogui.moveTo(pos)
    counter = 0
    while counter < 60:
        print(pyautogui.position())
        if stop is True:
            return
        print(counter)
        if cancel:
            cancel = False
            reset()
            return
        # print(pyautogui.position())
        if pause is False:
            counter += 1
        sleep(1)
    
    sleep(2)
    pos = pyautogui.position()
    pyautogui.click(1448, 628)
    sleep(0.1)
    pyautogui.click(1448, 628)
    sleep(1)
    pyautogui.click(1596, 628)
    sleep(0.1)
    pyautogui.click(1596, 628)
    sleep(2)
    pyautogui.moveTo(pos)
    reset()


def here(event = None):
    global pause
    global cancel
    global pos
    pause = False
    cancel = True
    sleep(1)
    cancel = False
    print('Reset Triggered')

def handlePause(event = None):
    print('Pause')
    global pause
    if pause is True:
        pause = False
    else:
        pause = True
    print(pause)


def handleStop(event = None):
    print('Escape')
    global stop
    stop = True


keyboard.on_press_key('alt', here)

keyboard.on_press_key('Pause', handlePause)
keyboard.on_press_key('Escape', handleStop)

reset()

