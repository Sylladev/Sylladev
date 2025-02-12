
����fr_FR���  ( 2ezoom:Enhanced Zoom DesktopBAEnhanced zoom functions for the visually impaired and other usersJAccessibilityZM
opengl
expo
decor
	mousepollstaticswitcherswitcheropengl	mousepoll�%
$
set_zoom_area"set_zoom_area* 0 
,
ensure_visibility"ensure_visibility* 0 
S
zoom_in_button"Zoom In Button*+Mouse button shortcut to invoke zooming in.0 Z 
B
zoom_in_key"Zoom In Key*"Key shortcut to invoke zooming in.0 
V
zoom_out_button"Zoom Out Button*,Mouse button shortcut to invoke zooming out.0 Z 
D
zoom_out_key"Zoom Out Key*"Key shortcut to invoke zooming in.0 
Z
zoom_box_button"Invoke Zoom Box Button*)Define a rectangle area and zoom into it.0 Z 
�
zoom_box_outline_color"Zoom Box Outline Color**Color and opacity of the zoom box outline.0 Z"" 
0x2fff0x2fff0x4fff"0x9fff
{
zoom_box_fill_color"Zoom Box Fill Color*'Fill color and opacity of the zoom box.0 Z"" 
0x2fff0x2fff0x2fff"0x4fff
q
center_mouse_key"Center the mouse*EPuts the mouse in the middle of the screen (Regardless of zoom level)0Z 
U
zoom_specific_1_key"Zoom Specific Level 1*!Zoom to the specific zoom level 10Z 
n

zoom_spec1"Specific zoom factor 1*,Zoom level to go to when triggering hotkey 10Z  �?}���=�  �?�
�#<
U
zoom_specific_2_key"Zoom Specific Level 2*!Zoom to the specific zoom level 20Z 
n

zoom_spec2"Specific zoom factor 2*,Zoom level to go to when triggering hotkey 20Z   ?}���=�  �?�
�#<
U
zoom_specific_3_key"Zoom Specific Level 3*!Zoom to the specific zoom level 30Z 
n

zoom_spec3"Specific zoom factor 3*,Zoom level to go to when triggering hotkey 30Z��L>}���=�  �?�
�#<
�
spec_target_focus "'Target Focused Window on Specific level*hEnable this to target the focused window when jumping to a specific zoom level. Disable to target mouse.0Z
t
lock_zoom_key"Toggle zoom area lock*FToggles a lock on the zoom area so it doesn't change on various events0Z 
B
pan_left_key"Pan Zoom Left*Pan (move) the zoom area left08 
E
pan_right_key"Pan Zoom Right*Pan (move) the zoom area right08 
<

pan_up_key"Pan Zoom Up*Pan (move) the zoom area up08 
B
pan_down_key"Pan Zoom Down*Pan (move) the zoom area down08 
t
fit_to_zoom_key" Fit the window to the zoom level*7Resize the window so it matches the current zoom level.08Z 
�
fit_to_window_key"Fit zoomed area to window*\Zooms in/out so the focused window is zoomed to the maximum while still being fully visible.08Z 
w
zoom_factor"Zoom factor*?Zoom in/out by this factor. Higher value means quicker zooming.0Z33�?}�G�?�  @@�
�#<
�
minimum_zoom"Minimum zoom factor*_The minimum allowed zoom factor. A value of 0.5 equals 2x zoom, a value of 0.25 equals 4x zoom.0Z   >}�7�5���?���8
o
	zoom_mode"	Zoom Mode*-How the cursor should be tracked when zooming0
Z ` hr 
Sync MouserPan Area
r
scale_mouse "Scale the mouse pointer*BEnable this to get a gradually larger mouse pointer as you zoom in0
Z
�
scale_mouse_dynamic "Dynamic mouse pointer scale*jWhen scaling the mouse pointer, this option makes the scale adjust according to the current level of zoom.0
Z
�
scale_mouse_static"Static mouse pointer scale*]When not using a dynamic mouse pointer scale, this is the scale factor for the mouse pointer.0
Z��L>}���=�  �?�
�#<
�
hide_original_mouse "Hide original mouse pointer*EHides the original mouse pointer when zoomed in and scaling the mouse0
Z
�
restrain_mouse "#Restrain the mouse to the zoom area*^Attempt to keep the zoomed mouse visible by warping it when it is moved outside the zoom area.0
Z 
z
restrain_margin"Mouse Restrain Margin*DThe size of the margin to add when attempting to restrain the mouse.0
Z
` hd
�

pan_factor"
Pan Factor*JMove the zoomed area this much whenever you pan the zoomed area with keys.08Z���=}o�:�  �?�o�:
U
follow_focus "Enable focus tracking*&Move the zoom area when focus changes.0Z
�
focus_fit_window "(Fit zoom level to window on focus change*[Fit the zoomed area to the window when the zoomed area moves as a result of focus tracking.0Z 
�
autoscale_min"Autoscale threshold*�Only change zoom level (scale) on focus change if the target value is higher than this. Prevents zooming too far in on small popups etc.0Z  �>}�7�5���?���8
�
always_focus_fit_window "#Always fit to window on focus track*~Fit the zoomed area to the window when the zoomed area moves as a result of focus tracking. Even when not initially zoomed in.0Z 
�
follow_focus_delay"Follow Focus Delay*�Only attempt to center newly focused windows if the mouse hasn't moved in this amount of seconds. Use this to avoid jumping when using sloppy focus.0Z ` h
8
speed"Vitesse*
Zoom Speed0Z  �A}���=�  �B����=
A
timestep"
Intervalle*Zoom Timestep0Z���?}���=�  HB����=Zoom In/OutMouse BehaviourSpecific ZoomZoom Area MovementZoom In/OutMouse BehaviourZoom Area MovementFocus Tracking	AnimationPanningFittingPanning