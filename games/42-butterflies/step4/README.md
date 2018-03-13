# 42 Butterflies #
## Step Four ##

We don't want our player to be limited to a small white box.
We need to create a level for the player to exist in.

Let's make a new file for our level. We can load a background image for the level.

Our background will need to move backwards when our player moves forward.
We can take care of this by changing the way we calculate our player's position.

When our player is at the beginning or end of the level, we don't want to see the background scroll away.
We need to set up some special boundaries so that the player can walk, but the background doesn't move.