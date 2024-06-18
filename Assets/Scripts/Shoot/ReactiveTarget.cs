using System.Collections;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using UnityEngine;

public class ReactiveTarget : MonoBehaviour {
    public async void ReactToHit()
    {
        SymplyAi behavior = GetComponent<SymplyAi>();
        if (behavior != null)
        {
            behavior.SetAlive(false);
        }
        await DieAsync();
    
    }

    // Update is called once per frame
    void Update()
    {

    }
    async Task DieAsync()
    {
        this.transform.Rotate(-75, 0, 0);
        await Task.Delay(900);
        Destroy(this.gameObject);
    }
}