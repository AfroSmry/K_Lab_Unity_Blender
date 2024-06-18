using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using System.Threading.Tasks;
using System.Diagnostics;

public class RayShooter : MonoBehaviour
{
    private Camera _camera;      
    void Start()
    {
        _camera = GetComponent<Camera>();
    }
    async void Update()
    {
        if (Input.GetMouseButtonDown(0))
        {
            Vector3 point = new Vector3(
            _camera.pixelWidth / 2, _camera.pixelHeight / 2, 0);
            Ray ray = _camera.ScreenPointToRay(point);
            RaycastHit hit;
            if (Physics.Raycast(ray, out hit))
            {
                GameObject hitObject = hit.transform.gameObject;
                ReactiveTarget target = hitObject.GetComponent<ReactiveTarget>(); 
                if (target != null)
                {
                    target.ReactToHit();
                } else
                {
                    await SphereIndicator(hit.point);
                }
            }
        }
    }
    async Task<Vector3> SphereIndicator(Vector3 pos)
    {
        GameObject sphere = GameObject.CreatePrimitive(PrimitiveType.Sphere);
        sphere.transform.position = pos;
        await Task.Delay(600);        
        Destroy(sphere);
        return sphere.transform.position;
    }
}
