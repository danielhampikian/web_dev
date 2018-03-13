# 42 Butterflies #
## Step Three ##

Our player flies off the screen, and really fast!

That's okay, let's take care of it. We'll add some basic physics.
 
We need friction and gravity.
Let's add those as global variables, and use them when calculating the player's position every frame.
 
To stay on screen, we can check our boundaries.
* We can't let the player go under the bottom of the screen (over the top is probably okay, because gravity will pull them back down!)
* We can't let the player go off the left and right edge of the screen.