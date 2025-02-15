
����fr_FR���  ( 2	animation:
AnimationsB(Use various animations as window effectsJEffectsRwindowanimationsZ6
decor
	composite
opengl
regexfadeopenglregex�Q
�
open_effects"Open Effect*2The animation effect shown when creating a window.0 8 HPZ2animation:Glide 2Z2animation:FadeZ2animation:Fade
k
open_durations"Duration*3Animation duration in milliseconds for open effect.0 8 Z�Z�Z�`dh�>
�
open_matches
"Window Match*"The windows that will be animated.0 8 Z�2�((type=Normal | Unknown) | name=sun-awt-X11-XFramePeer | name=sun-awt-X11-XDialogPeer) & !(role=toolTipTip | role=qtooltip_label) & !(type=Normal & override_redirect=1) & !(name=gnome-screensaver)Ze2c((type=Menu | PopupMenu | DropdownMenu | Combo | Dialog | ModalDialog | Normal) & !(class=\\.exe$))ZP2N(type=Tooltip | Notification | Utility) & !(name=compiz) & !(title=notify-osd)
�
open_options"Options*�Comma separated list of option value assignments to override effect settings, e.g.: fire_color=#0080ffff, fire_particles=700, fire_smoke=10 8 Z Z Z 
�
open_random_effects"Pool*_Pool of effects to be chosen from if Random effect is selected. Click reset to use all effects.0 8HP
�
close_effects"Close Effect*1The animation effect shown when closing a window.08HPZ2animation:Glide 2Z2animation:FadeZ2animation:Fade
l
close_durations"Duration*4Animation duration in milliseconds for close effect.08Z�Z�Zd`dh�>
�
close_matches
"Window Match*"The windows that will be animated.08Z�2�((type=Normal | Unknown) | name=sun-awt-X11-XFramePeer | name=sun-awt-X11-XDialogPeer) & !(role=toolTipTip | role=qtooltip_label) & !(type=Normal & override_redirect=1) & !(name=gnome-screensaver) & !(name=gnome-screenshot)Ze2c((type=Menu | PopupMenu | DropdownMenu | Combo | Dialog | ModalDialog | Normal) & !(class=\\.exe$))ZP2N(type=Tooltip | Notification | Utility) & !(name=compiz) & !(title=notify-osd)
�
close_options"Options*�Comma separated list of option value assignments to override effect settings, e.g.: fire_color=#0080ffff, fire_particles=700, fire_smoke=108Z Z Z 
�
close_random_effects"Pool*_Pool of effects to be chosen from if Random effect is selected. Click reset to use all effects.08HP
}
minimize_effects"Effet de Minimisation*4The animation effect shown when minimizing a window.08HPZ2animation:Zoom
i
minimize_durations"Duration*7Animation duration in milliseconds for minimize effect.08Z�`dh�>
~
minimize_matches
"Window Match*"The windows that will be animated.08Z02.(type=Normal | Dialog | ModalDialog | Unknown)
�
minimize_options"Options*�Comma separated list of option value assignments to override effect settings, e.g.: fire_color=#0080ffff, fire_particles=700, fire_smoke=108Z 
�
minimize_random_effects"Pool*_Pool of effects to be chosen from if Random effect is selected. Click reset to use all effects.08
HP
�
unminimize_effects"Unminimize Effect*6The animation effect shown when unminimizing a window.08HPZ2animation:Magic Lamp
m
unminimize_durations"Duration*9Animation duration in milliseconds for unminimize effect.08Z�`dh�>
�
unminimize_matches
"Window Match*"The windows that will be animated.08Z02.(type=Normal | Dialog | ModalDialog | Unknown)
�
unminimize_options"Options*�Comma separated list of option value assignments to override effect settings, e.g.: fire_color=#0080ffff, fire_particles=700, fire_smoke=108Z 
�
unminimize_random_effects"Pool*_Pool of effects to be chosen from if Random effect is selected. Click reset to use all effects.08HP
q
shade_effects"Shade Effect*1The animation effect shown when shading a window.08HPZ2animation:Roll Up
c
shade_durations"Duration*4Animation duration in milliseconds for shade effect.08Z�`dh�>
�
shade_matches
"Window Match*8Window that should animate with this effect when shaded.08Z:28(type=Normal | Dialog | ModalDialog | Utility | Unknown)
�
shade_options"Options*�Comma separated list of option value assignments to override effect settings, e.g.: fire_color=#0080ffff, fire_particles=700, fire_smoke=108Z 
�
shade_random_effects"Pool*_Pool of effects to be chosen from if Random effect is selected. Click reset to use all effects.08HP
q
focus_effects"Effet de focus*2The animation effect shown when focusing a window.0
8HPZ2animation:Fade
c
focus_durations"Duration*4Animation duration in milliseconds for focus effect.0
8Z�`dh�>
�
focus_matches
"Window Match*9Window that should animate with this effect when focused.0
8ZK2I(type=Normal | Dialog | ModalDialog | Utility | Unknown) & !(name=compiz)
�
focus_options"Options*�Comma separated list of option value assignments to override effect settings, e.g.: fire_color=#0080ffff, fire_particles=700, fire_smoke=10
8Z 
�

all_random " Random Animations For All Events*~All effects are chosen randomly, ignoring the selected effect. If None is selected for an event, that event won't be animated.0Z 
�
	time_step"Animation Time Step*�The amount of time in milliseconds between each render of the animation. The higher the number, the jerkier the movements become.0Z `h�
�
curved_fold_amp_mult"Amplitude Multiplier*QFold amplitude (size) is multiplied by this number. Negative values fold outward.08Z  �?}  ���   @���L=
�
curved_fold_zoom_to_taskbar "Zoom to TaskBar on Minimize*QWhether the window should zoom to taskbar when minimized with Curved Fold effect.08Z
�

dodge_mode"Mode*�Fixed Clicked Window: The window that is clicked on will stay fixed. All Moving: The clicked window will do a dodging action as well.08Z` hr Fixed Clicked Windowr
All Moving
v
dodge_gap_ratio"	Gap Ratio*:Ratio of gaps between dodge start times to focus duration.08Z   ?}    �  �?�
�#<
�
dream_zoom_to_taskbar "Zoom to TaskBar on Minimize*KWhether the window should zoom to taskbar when minimized with Dream effect.08Z
�
glide1_away_position"Away Position*iCloseness of window to camera at the end of the animation (1.0: Close to camera, -2.0: Away from camera).08Z  �?}   ��  �?���L=
k
glide1_away_angle"
Away Angle*,Angle of window at the end of the animation.08Z    }  ą  D�  �@
�
glide1_zoom_to_taskbar "Zoom to TaskBar on Minimize*MWhether the window should zoom to taskbar when minimized with Glide 1 effect.08Z 
�
glide2_away_position"Away Position*iCloseness of window to camera at the end of the animation (1.0: Close to camera, -2.0: Away from camera).08Z��̽}   ��  �?���L=
k
glide2_away_angle"
Away Angle*,Angle of window at the end of the animation.08Z    }  ą  D�  �@
�
glide2_zoom_to_taskbar "Zoom to TaskBar on Minimize*MWhether the window should zoom to taskbar when minimized with Glide 2 effect.08Z
�
horizontal_folds_amp_mult"Amplitude Multiplier*QFold amplitude (size) is multiplied by this number. Negative values fold outward.08 Z  �?}  ���  @@���L=
�
horizontal_folds_num_folds"Number of Horizontal Folds*KThe number of horizontal folds that occur in the Horizontal Fold animation.08 Z`hd
�
 horizontal_folds_zoom_to_taskbar "Zoom to TaskBar on Minimize*VWhether the window should zoom to taskbar when minimized with Horizontal Folds effect.08 Z
}
magic_lamp_moving_end "Open/Close Moving End*COn open/close, move magic lamp ending point with the mouse pointer.08"Z
�
magic_lamp_grid_res"Grid Y Resolution*�Vertex grid resolution for Magic Lamp (Y dimension only). This is the number of points used to define the curves. The higher the number, the smoother the curves. However there will be a loss of performance (CPU usage increases).08"Z�`h�
�
magic_lamp_open_start_width"Open Start Width*NStarting width of open effect and ending width of close effect for Magic Lamp.08"Z<` h�
�
magic_lamp_wavy_moving_end "Open/Close Moving End*COn open/close, move magic lamp ending point with the mouse pointer.08$Z
�
magic_lamp_wavy_grid_res"Grid Y Resolution*�Vertex grid resolution for Magic Lamp Wavy (Y dimension only). This is the number of points used to define the curves. The higher the number, the smoother the curves. However there will be a loss of performance (CPU usage increases).08$Z�`h�
f
magic_lamp_wavy_max_waves"	Max Waves*0The maximum number of waves for Magic Lamp Wavy.08$Z`h(
�
magic_lamp_wavy_amp_min"Min Wave Amplitude*IThe minimum wave amplitude (size of the waves) Magic Lamp Wavy will have.08$Z  HC}  HC�  �D�  �@
�
magic_lamp_wavy_amp_max"Max Wave Amplitude*IThe maximum wave amplitude (size of the waves) Magic Lamp Wavy will have.08$Z  �C}  HC�  �D�  �@
�
 magic_lamp_wavy_open_start_width"Open Start Width*SStarting width of open effect and ending width of close effect for Magic Lamp Wavy.08$Z<` h�
c
rollup_fixed_interior "Fixed Interior*2Fixed window interior during the Rollup animation.08&Z 
�
sidekick_num_rotations"Number of Rotations*DNumber of rotations for Sidekick (plus or minus 10% for randomness).08(Z   ?}    �  �@�
�#<
t
sidekick_springiness"Springiness*1How spring-like the Sidekick animation should be.08(Z    }    �  �?�
�#<
�
sidekick_zoom_from_center"Zoom from Center*5Zoom from center when playing the Sidekick animation.08(Z ` hr OffrMinimize/Unminimize OnlyrOpen/Close OnlyrOn
l

wave_width"
Wave Width*4The width of the wave relative to the window height.08*Z333?}
ף<�  @@�
�#<
�
wave_amp_mult"Wave Amplitude Multiplier*QWave amplitude (size) is multiplied by this number. Negative values fold outward.08*Z  �?}  ���  �A����=
�
zoom_from_center"Zoom from Center*1Zoom from center when playing the Zoom animation.08,Z ` hr OffrMinimize/Unminimize OnlyrOpen/Close OnlyrOn
l
zoom_springiness"Springiness*-How spring-like the Zoom animation should be.08,Z
ף=}    �  �?�
�#<Open AnimationClose AnimationMinimize AnimationUnminimize AnimationShade AnimationFocus AnimationEffect SettingsAnimation SelectionRandom EffectsAnimation SelectionRandom EffectsAnimation SelectionRandom EffectsAnimation SelectionRandom EffectsAnimation SelectionRandom EffectsAnimation SelectionCurved FoldDodgeDreamGlide 1Glide 2Horizontal Folds
Magic LampMagic Lamp WavyRoll UpSidekickWaveZoom�
	animationopen_effectsclose_effectsminimize_effectsunminimize_effectsshade_effects
animation:NoneAucun
animation:Random
Aléatoire�
	animationopen_effectsopen_random_effectsclose_effectsclose_random_effectsminimize_effectsminimize_random_effectsunminimize_effectsunminimize_random_effectsshade_effectsshade_random_effects$
animation:Curved FoldCurved Fold.
animation:Horizontal FoldsHorizontal FoldsN
	animationshade_effectsshade_random_effects
animation:Roll UpRoll Up�
	animationopen_effectsopen_random_effectsclose_effectsclose_random_effectsminimize_effectsminimize_random_effectsunminimize_effectsunminimize_random_effects
animation:DreamDream
animation:FadeFade
animation:Glide 1Glide 1
animation:Glide 2Glide 2"
animation:Magic Lamp
Magic Lamp,
animation:Magic Lamp WavyMagic Lamp Wavy
animation:SidekickSidekick
animation:ZoomZoomk
	animationopen_effectsopen_random_effectsclose_effectsclose_random_effects
animation:WaveWave�
	animationfocus_effects
animation:NoneAucun
animation:DodgeDodge
animation:Focus FadeFade
animation:WaveWave